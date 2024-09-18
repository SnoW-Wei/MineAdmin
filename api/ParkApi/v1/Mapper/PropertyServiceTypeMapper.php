<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\PropertyServiceType;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 服务类型Mapper类
 */
class PropertyServiceTypeMapper extends AbstractMapper
{
    /**
     * @var PropertyServiceType
     */
    public $model;

    /**
     * 查询的菜单字段.
     */
    public array $menuField = [
        'id',
        'parent_id',
        'name',
    ];

    public function assignModel()
    {
        $this->model = PropertyServiceType::class;
    }

    /**
     * 列表部，不分页
     * @param array|null $params
     * @param bool $isScope
     * @return array
     */
    public function getList(?array $params = null, bool $isScope = true) : array
    {
        $data = $this->handleSearch($this->model::query(), $params , $isScope)->get()->toArray();
        return $data;
    }

    /**
     * 通过父ID列表获取服务类型.
     */
    public function getTypesById(int $id): array
    {
        return $this->model::query()
            ->select($this->menuField)
            ->where('parent_id', $id)
            ->where('status', $this->model::ENABLE)
            ->orderBy('sort', 'desc')
            ->get()->toArray();
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        if (isset($params['parent_id']) && filled($params['parent_id'])) {
            $query->where('parent_id', $params['parent_id']);
        }

        return $query;
    }
}
