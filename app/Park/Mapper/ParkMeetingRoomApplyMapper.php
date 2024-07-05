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

use App\Park\Model\ParkMeetingRoomApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 预订申请Mapper类
 */
class ParkMeetingRoomApplyMapper extends AbstractMapper
{
    /**
     * @var ParkMeetingRoomApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkMeetingRoomApply::class;
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

        // 支付单号
        if (isset($params['pay_order']) && filled($params['pay_order'])) {
            $query->where('pay_order', 'like', '%'.$params['pay_order'].'%');
        }

        // 支付时间
        if (isset($params['pay_time']) && filled($params['pay_time']) && is_array($params['pay_time']) && count($params['pay_time']) == 2) {
            $query->whereBetween(
                'pay_time',
                [ $params['pay_time'][0], $params['pay_time'][1] ]
            );
        }

        // 支付状态
        if (isset($params['pay_status']) && filled($params['pay_status'])) {
            $query->where('pay_status', '=', $params['pay_status']);
        }

        // 申请帐号
        if (isset($params['user_id']) && filled($params['user_id'])) {
            $query->where('user_id', '=', $params['user_id']);
        }

        // 申请人姓名
        if (isset($params['apply_name']) && filled($params['apply_name'])) {
            $query->where('apply_name', 'like', '%'.$params['apply_name'].'%');
        }

        // 申请人电话
        if (isset($params['apply_phone']) && filled($params['apply_phone'])) {
            $query->where('apply_phone', '=', $params['apply_phone']);
        }

        // 申请时段
        if (isset($params['apply_time_period']) && filled($params['apply_time_period'])) {
            $query->where('apply_time_period', '=', $params['apply_time_period']);
        }

        // 会议室编号
        if (isset($params['room_id']) && filled($params['room_id'])) {
            $query->where('room_id', '=', $params['room_id']);
        }

        // 支付类型
        if (isset($params['pay_type']) && filled($params['pay_type'])) {
            $query->where('pay_type', '=', $params['pay_type']);
        }

        // 审核状态
        if (isset($params['status']) && filled($params['status'])) {
            $query->where('status', '=', $params['status']);
        }

        // 企业支付截图
        if (isset($params['image']) && filled($params['image'])) {
            $query->where('image', '=', $params['image']);
        }

        // 基础服务套餐
        if (isset($params['base_option']) && filled($params['base_option'])) {
            $query->where('base_option', '=', $params['base_option']);
        }

        // 铂金服务套餐
        if (isset($params['platinum_option']) && filled($params['platinum_option'])) {
            $query->where('platinum_option', '=', $params['platinum_option']);
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