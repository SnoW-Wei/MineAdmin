<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\PropertyServiceApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 服务申请Mapper类
 */
class PropertyServiceApplyMapper extends AbstractMapper
{
    /**
     * @var PropertyServiceApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = PropertyServiceApply::class;
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        return $query;
    }
}
