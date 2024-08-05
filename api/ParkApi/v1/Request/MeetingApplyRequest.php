<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Request;

use Mine\MineFormRequest;

/**
 * 预订申请验证数据类
 */
class MeetingApplyRequest extends MineFormRequest
{
    /**
     * 公共规则
     */
    public function commonRules(): array
    {
        return [];
    }


    /**
     * 新增数据验证规则
     * return array
     */
    public function saveRules(): array
    {
        return [

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [
            //审核状态 验证
        ];
    }


    /**
     * 字段映射名称
     * return array
     */
    public function attributes(): array
    {
        return [
            'id' => '',
            'pay_order' => '支付单号',
            'pay_time' => '支付时间',
            'pay_status' => '支付状态',
            'user_id' => '申请帐号',
            'apply_name' => '申请人姓名',
            'apply_phone' => '申请人电话',
            'apply_time_period' => '申请时段',
            'room_id' => '会议室编号',
            'pay_type' => '支付类型',
            'status' => '审核状态',

        ];
    }

}
