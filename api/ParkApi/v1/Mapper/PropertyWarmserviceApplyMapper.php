<?php
declare(strict_types=1);
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\PropertyWarmserviceApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;
use Mine\MineModel;
/**
 * 温馨服务申请Mapper类
 */
class PropertyWarmserviceApplyMapper extends AbstractMapper
{
    /**
     * @var PropertyWarmserviceApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = PropertyWarmserviceApply::class;
    }

    /**
     * @param array|null $params
     * @param bool $isScope
     * @param string $pageName
     * @return array
     */
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
     * @param array $params
     * @return Builder|\Hyperf\Database\Model\Model
     */
    public function getOne(array $params)
    {
        $query = $this->handleSearch($this->model::query(),$params);
        return $query->first();
    }

    /**
     * @param array $params
     * @return int
     */
    public function counts(array $params):int
    {
        $query = $this->handleSearch($this->model::query(),$params);
        return $query->count();
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {

        $query->where('user_id',user('xcx')->getId());

        if (isset($params['orderBy']) && filled($params['orderBy'])) {
            $orderType = filled($params['orderType'])? $params['orderType']:'ASC';
            $query->orderBy($params['orderBy'],$orderType);
        }

        if (isset($params['apply_date']) && filled($params['apply_date'])) {
            $orderType = filled($params['apply_date'])? $params['apply_date']:'';
            $query->where('apply_date',$orderType);
        }

        if (isset($params['service_type']) && filled($params['service_type'])) {
            $query->where('service_type',$params['service_type']);
        }

        if (isset($params['status']) && filled($params['status'])) {
            $query->whereIn('status',$params['status']);
        }

        $query->whereNull('deleted_at');
        return $query;
    }
}
