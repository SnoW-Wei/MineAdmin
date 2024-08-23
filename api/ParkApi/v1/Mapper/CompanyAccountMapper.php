<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\CompanyAccount;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;
use Mine\MineModel;

/**
 * 对公账户信息Mapper类
 */
class CompanyAccountMapper extends AbstractMapper
{
    /**
     * @var CompanyAccount
     */
    public $model;

    public function assignModel()
    {
        $this->model = CompanyAccount::class;
    }

    /**
     * @param array $condition
     * @return MineModel|null
     */
    public function readOne(array $condition): ?MineModel
    {
        return $this->handleSearch($this->model::query(), $condition)->first();
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {

        $query->orderBy('created_at', 'desc');

        return $query;
    }
}
