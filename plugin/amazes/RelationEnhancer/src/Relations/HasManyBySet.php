<?php

namespace Amazes\RelationEnhancer\Relations;

use Hyperf\Database\Model\Builder;
use Hyperf\Database\Model\Collection;
use Hyperf\Database\Model\Model;
use Hyperf\Database\Model\Relations\Constraint;
use Hyperf\Database\Model\Relations\Relation;
use function Hyperf\Collection\collect;

class HasManyBySet extends Relation
{
    private string $relatedKey;
    private string $foreignKey;

    private ?\Closure $foreignKeyHandler;

    /**
     * Create a new has one or many relationship instance.
     *
     * @param Builder $query
     * @param Model $parent
     * @param string $foreignKey 本表外键 Format 'id1,id2' | array<id>
     * @param string $relatedKey 关联表主键
     */
    public function __construct(Builder $query, Model $parent, string $foreignKey , string $relatedKey, ?\Closure $foreignKeyHandler = null)
    {
        // Initialize foreignKey and relatedKey
        $this->foreignKey = $foreignKey;
        $this->relatedKey = $relatedKey;
        $this->foreignKeyHandler = $foreignKeyHandler;

        parent::__construct($query, $parent);
    }

    /**
     * Get all of the primary keys for an array of models.
     *
     * @param array $models
     * @param null $key
     * @return array
     */
    protected function getKeys(array $models, $key = null): array
    {
        return collect($models)->map(function ($model) use ($key) {
            return $this->parseForeignKey($model,$key);
        })->flatten()->values()->unique(null, true)->sort()->all();
    }

    /**
     * Apply the constraints for the relationship query.
     */
    public function addConstraints()
    {
        if (Constraint::isConstraint()) {
            $whereIn = $this->whereInMethod($this->parent, $this->relatedKey);
            // Parse the foreign key and apply the whereIn constraint
            $foreignKeyValues = $this->parseForeignKey();
            $this->query->{$whereIn}(
                $this->relatedKey,
                $foreignKeyValues
            );
        }
    }

    /**
     * Add constraints for an eager load of the relationship.
     *
     * @param array $models
     */
    public function addEagerConstraints(array $models)
    {
        $foreignKeyValues = $this->getKeys($models, $this->foreignKey);
        $whereIn = $this->whereInMethod($this->parent, $this->relatedKey);
        // Apply a whereIn constraint with the gathered foreign key values
        $this->query->{$whereIn}(
            $this->relatedKey,
            $foreignKeyValues
        );
    }

    /**
     * Initialize the relation on a set of models.
     *
     * @param array $models
     * @param string $relation
     * @return array
     */
    public function initRelation(array $models, $relation)
    {
        // Initialize the relation to an empty collection for each model
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related->newCollection());
        }

        return $models;
    }

    /**
     * Match the eagerly loaded results to their parent models.
     *
     * @param array $models
     * @param Collection $results
     * @param string $relation
     * @return array
     */
    public function match(array $models, Collection $results, $relation)
    {
        $dictionary = $results->getDictionary();

        // Match related models to the parent models
        foreach ($models as $model) {
            $foreignKeyValues = $this->parseForeignKey($model);

            $relatedModels = [];

            // Gather related models based on the foreign key values
            foreach ($foreignKeyValues as $value) {
                if (isset($dictionary[$value])) {
                    $relatedModels[] = $dictionary[$value];
                }
            }

            // Set the related models to the parent model
            $model->setRelation($relation, $this->related->newCollection($relatedModels));
        }

        return $models;
    }

    /**
     * Get the results of the relationship.
     *
     * @return Collection
     */
    public function getResults()
    {
        // Execute the query and return the results
        return $this->query->get();
    }

    /**
     * Parse the foreign key values from the model.
     *
     * @param Model|null $model
     * @param string|null $key
     * @return array
     * @throws \Exception
     */
    protected function parseForeignKey(Model $model = null, ?string $key = null) :array
    {
        $fieldName = $key ?: $this->foreignKey;
        // Get the foreign key value from the model or parent
        $foreignKeyValue = $model ? $model->{$fieldName} : $this->parent->{$fieldName};

        // 如果传入了解析函数
        if ($this->foreignKeyHandler) {
            $orgValue = $model ? $model->getRawOriginal($fieldName) : $this->parent->getRawOriginal($fieldName);;
            $foreignKeyValue = call_user_func($this->foreignKeyHandler, $orgValue,$foreignKeyValue);
            if (!is_array($foreignKeyValue)){
                throw new \Exception('foreignKeyHandler must return array');
            }
        }
        // Return the foreign key values as an array
        if (is_array($foreignKeyValue)) {
            return $foreignKeyValue;
        }
        if (is_string($foreignKeyValue)){
            return explode(',', $foreignKeyValue);
        }
        return [];
    }
}
