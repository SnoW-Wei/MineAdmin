<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\Dormitory;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 配套宿舍Mapper类
 */
class DormitoryMapper extends AbstractMapper
{
    /**
     * @var Dormitory
     */
    public $model;

    public function assignModel()
    {
        $this->model = Dormitory::class;
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
