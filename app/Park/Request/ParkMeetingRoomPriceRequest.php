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
namespace App\Park\Request;

use Mine\MineFormRequest;

/**
 * 会议室基本费用验证数据类
 */
class ParkMeetingRoomPriceRequest extends MineFormRequest
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
            //名称 验证
            'name' => 'required',
            //年月开始 验证
            'year_month_start' => 'required',
            //年月结束 验证
            'year_month_end' => 'required',
            //时段 验证
            'time_period' => 'required',
            //原价格 验证
            'origin_price' => 'required',
            //优惠价格 验证
            'discount_price' => 'required',
            //优惠说明 验证
            'desc' => 'required',

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [
            //名称 验证
            'name' => 'required',
            //年月开始 验证
            'year_month_start' => 'required',
            //年月结束 验证
            'year_month_end' => 'required',
            //时段 验证
            'time_period' => 'required',
            //原价格 验证
            'origin_price' => 'required',
            //优惠价格 验证
            'discount_price' => 'required',
            //优惠说明 验证
            'desc' => 'required',

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
            'name' => '名称',
            'year_month_start' => '年月开始',
            'year_month_end' => '年月结束',
            'time_period' => '时段',
            'origin_price' => '原价格',
            'discount_price' => '优惠价格',
            'desc' => '优惠说明',

        ];
    }

}