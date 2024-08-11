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
 * 医疗箱-温馨服务验证数据类
 */
class ParkPropertyWarmserviceMedicalRequest extends MineFormRequest
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
            //数量 验证
            'num' => 'required',
            //地址 验证
            'address' => 'required',
            //图片 验证
            'image' => 'required',
            //医疗资源 验证
            'category' => 'required',
            //说明 验证
            'content' => 'required',

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
            //数量 验证
            'num' => 'required',
            //地址 验证
            'address' => 'required',
            //图片 验证
            'image' => 'required',
            //医疗资源 验证
            'category' => 'required',
            //说明 验证
            'content' => 'required',

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
            'num' => '数量',
            'address' => '地址',
            'image' => '图片',
            'category' => '医疗资源',
            'content' => '说明',

        ];
    }

}