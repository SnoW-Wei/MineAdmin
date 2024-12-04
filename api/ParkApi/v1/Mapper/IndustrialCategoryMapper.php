<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\IndustrialCategory;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 服务类型Mapper类
 */
class IndustrialCategoryMapper extends AbstractMapper
{
    /**
     * @var IndustrialCategory
     */
    public $model;

    public function assignModel()
    {
        $this->model = IndustrialCategory::class;
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {

        //

        return $query;
    }
}
