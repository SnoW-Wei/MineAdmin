<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\WhiteList;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 物品放行手机白名单Mapper类
 */
class WhiteListMapper extends AbstractMapper
{
    /**
     * @var WhiteList
     */
    public $model;

    public function assignModel()
    {
        $this->model = WhiteList::class;
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
