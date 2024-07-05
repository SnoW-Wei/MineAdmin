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
 * 详情配置验证数据类
 */
class ParkMeetingRoomRequest extends MineFormRequest
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
            //标题 验证
            'title' => 'required',
            //小标题 验证
            'subtitle' => 'required',
            //图片 验证
            'images' => 'required',
            //联系电话 验证
            'tel' => 'required',
            //基础费用 验证
            'time_period' => 'required',
            //详细信息 验证
            'detail' => 'required',

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [
            //标题 验证
            'title' => 'required',
            //小标题 验证
            'subtitle' => 'required',
            //图片 验证
            'images' => 'required',
            //联系电话 验证
            'tel' => 'required',
            //基础费用 验证
            'time_period' => 'required',
            //详细信息 验证
            'detail' => 'required',

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
            'title' => '标题',
            'subtitle' => '小标题',
            'images' => '图片',
            'tel' => '联系电话',
            'time_period' => '基础费用',
            'detail' => '详细信息',

        ];
    }

}