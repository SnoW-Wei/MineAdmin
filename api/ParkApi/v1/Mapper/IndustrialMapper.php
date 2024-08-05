<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\Industrial;
use Hyperf\Database\Model\Builder;
use Hyperf\Database\Model\Model;
use Mine\Abstracts\AbstractMapper;
use Mine\Annotation\Transaction;
use Mine\MineModel;

class IndustrialMapper extends AbstractMapper
{
    public $model;

    public function assignModel()
    {
        $this->model = Industrial::class;
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
        return $query;
    }
}
