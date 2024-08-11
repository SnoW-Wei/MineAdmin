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
 * 园区租赁-温馨服务验证数据类
 */
class ParkPropertyWarmserviceRentRequest extends MineFormRequest
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
            //图片 验证
            'image' => 'required',
            //地址 验证
            'address' => 'required',
            //数量 验证
            'num' => 'required',
            //限租数量 验证
            'limit' => 'required',
            //租金费用 验证
            'fee' => 'required',
            //租借说明 验证
            'content' => 'required',
            //时间描述 验证
            'rent_time' => 'required',

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
            //图片 验证
            'image' => 'required',
            //地址 验证
            'address' => 'required',
            //数量 验证
            'num' => 'required',
            //限租数量 验证
            'limit' => 'required',
            //租金费用 验证
            'fee' => 'required',
            //租借说明 验证
            'content' => 'required',
            //时间描述 验证
            'rent_time' => 'required',

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
            'image' => '图片',
            'address' => '地址',
            'num' => '数量',
            'limit' => '限租数量',
            'fee' => '租金费用',
            'content' => '租借说明',
            'rent_time' => '时间描述',

        ];
    }

}