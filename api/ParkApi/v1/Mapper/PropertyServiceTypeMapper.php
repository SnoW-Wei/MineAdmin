<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\PropertyServiceType;
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
}
