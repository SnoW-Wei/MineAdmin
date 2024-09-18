<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\PropertyReleaseApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;
use Mine\MineModel;

/**
 * 物品放行Mapper类
 */
class PropertyReleaseApplyMapper extends AbstractMapper
{
    /**
     * @var PropertyReleaseApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = PropertyReleaseApply::class;
    }

    public function getPageList(?array $params, bool $isScope = true, string $pageName = 'page'): array
    {
        $query = $this->handleSearch($this->model::query(),$params);

        return $this->setPaginate(
            $query->paginate(
                (int) ($params['pageSize'] ?? $this->model::PAGE_SIZE),
                ['*'],
                'page',
                (int) ($params['page'] ?? 1)
            )
        );
    }

    /**
     * 获取详情
     */
    public function read(mixed $id, array $column = ['*']): ?MineModel
    {
        return $this->handleSearch($this->model::query(), [])->find($id);
    }

    /**
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        $query->where('user_id',user('xcx')->getId());

        if (isset($params['orderBy']) && filled($params['orderBy'])) {
            $orderType = filled($params['orderType'])? $params['orderType']:'DESC';
            $query->orderBy($params['orderBy'],$orderType);
        }
        if (isset($params['apply_date']) && filled($params['apply_date'])) {
            $apply_date = $params['apply_date'];

            $query->whereBetween(
                'apply_date',
                [$apply_date['start_date'] . ' 00:00:00', $apply_date['end_date'] . ' 23:59:59']
            );
        }

        if (isset($params['created_at']) && filled($params['created_at']) && is_array($params['created_at']) && count($params['created_at']) == 2) {
            $query->whereBetween(
                'created_at',
                [$params['created_at'][0] . ' 00:00:00', $params['created_at'][1] . ' 23:59:59']
            );
        }

        return $query;
    }
}
