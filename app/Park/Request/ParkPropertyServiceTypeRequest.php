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
 * 服务类型验证数据类
 */
class ParkPropertyServiceTypeRequest extends MineFormRequest
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
            //父级 验证
            'parent_id' => 'required',
            //状态 验证
            'status' => 'required',
            //排序 验证
            'sort' => 'required',

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
            //父级 验证
            'parent_id' => 'required',
            //状态 验证
            'status' => 'required',
            //排序 验证
            'sort' => 'required',

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
            'parent_id' => '父级',
            'status' => '状态',
            'sort' => '排序',

        ];
    }

}