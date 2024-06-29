<?php

namespace Amazes\RelationEnhancer\Concerns;

use Amazes\RelationEnhancer\Relations\HasManyBySet;
use Hyperf\Database\Model\Builder;
use Hyperf\Database\Model\Model;

trait EnhancerRelationships
{
    /**
     * Can load relation by id array or string
     *
     * @param $related
     * @param string|null $foreignKey Format id1, id2 | array<id>
     * @param string|null $relatedKey
     * @param \Closure|null $foreignKeyHandler Callback function that will be passed parameters: $rawValue, $attrValue
     *                                          - $rawValue: The original value of the field
     *                                          - $attrValue: The attribute value after being processed by an accessor or converted through casts
     * @return HasManyBySet
     */
    public function hasManyBySet($related, string $foreignKey = null, string $relatedKey = null, \Closure $foreignKeyHandler = null): HasManyBySet
    {
        $instance = $this->newRelatedInstance($related);
        $foreignKey = $foreignKey ?: $instance->getForeignKey() . 's';
        $relatedKey = $relatedKey ?: $instance->getKeyName();
        return $this->newHasManyBySet($instance->newQuery(), $this, $foreignKey, $relatedKey, $foreignKeyHandler);
    }

    protected function newHasManyBySet(Builder $query, Model $parent, $foreignKey, $relatedKey, $delimiter): HasManyBySet
    {
        return new HasManyBySet($query, $parent, $foreignKey, $relatedKey, $delimiter);
    }
}