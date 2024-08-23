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

namespace App\Park\Mapper;

use App\Park\Model\ParkPropertyWarmserviceApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 温馨服务申请Mapper类
 */
class ParkPropertyWarmserviceApplyMapper extends AbstractMapper
{
    /**
     * @var ParkPropertyWarmserviceApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkPropertyWarmserviceApply::class;
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
        if (isset($params['id']) && filled($params['id'])) {
            $query->where('id', '=', $params['id']);
        }

        // 用户ID
        if (isset($params['user_id']) && filled($params['user_id'])) {
            $query->where('user_id', '=', $params['user_id']);
        }

        // 服务名称
        if (isset($params['service_id']) && filled($params['service_id'])) {
            $query->where('service_id', '=', $params['service_id']);
        }

        // 服务类型
        if (isset($params['service_type']) && filled($params['service_type'])) {
            $query->where('service_type', '=', $params['service_type']);
        }

        // 申请数量
        if (isset($params['apply_num']) && filled($params['apply_num'])) {
            $query->where('apply_num', '=', $params['apply_num']);
        }

        // 申请时间
        if (isset($params['apply_date']) && filled($params['apply_date']) && is_array($params['apply_date']) && count($params['apply_date']) == 2) {
            $query->whereBetween(
                'apply_date',
                [ $params['apply_date'][0], $params['apply_date'][1] ]
            );
        }

        // 支付金额
        if (isset($params['pay_money']) && filled($params['pay_money'])) {
            $query->where('pay_money', '=', $params['pay_money']);
        }

        // 支付订单号
        if (isset($params['pay_wechat_no']) && filled($params['pay_wechat_no'])) {
            $query->where('pay_wechat_no', 'like', '%'.$params['pay_wechat_no'].'%');
        }

        // 状态
        if (isset($params['status']) && filled($params['status'])) {
            $query->where('status', '=', $params['status']);
        }

        // 创建时间
        if (isset($params['created_at']) && filled($params['created_at']) && is_array($params['created_at']) && count($params['created_at']) == 2) {
            $query->whereBetween(
                'created_at',
                [ $params['created_at'][0], $params['created_at'][1] ]
            );
        }

        // 更新时间
        if (isset($params['updated_at']) && filled($params['updated_at']) && is_array($params['updated_at']) && count($params['updated_at']) == 2) {
            $query->whereBetween(
                'updated_at',
                [ $params['updated_at'][0], $params['updated_at'][1] ]
            );
        }

        // 删除时间
        if (isset($params['deleted_at']) && filled($params['deleted_at']) && is_array($params['deleted_at']) && count($params['deleted_at']) == 2) {
            $query->whereBetween(
                'deleted_at',
                [ $params['deleted_at'][0], $params['deleted_at'][1] ]
            );
        }

        return $query;
    }
}