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
 * 服务内容验证数据类
 */
class ParkIndustrialServiceRequest extends MineFormRequest
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
            //分类类型 验证
            'category_id' => 'required',
            //标题 验证
            'title' => 'required',
            //小标题 验证
            'subtitle' => 'required',
            //公司名称 验证
            'company' => 'required',
            //列表小图 验证
            'image' => 'required',
            //公司介绍 验证
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
            //分类类型 验证
            'category_id' => 'required',
            //标题 验证
            'title' => 'required',
            //小标题 验证
            'subtitle' => 'required',
            //公司名称 验证
            'company' => 'required',
            //列表小图 验证
            'image' => 'required',
            //公司介绍 验证
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
            'category_id' => '分类类型',
            'title' => '标题',
            'subtitle' => '小标题',
            'company' => '公司名称',
            'image' => '列表小图',
            'content' => '公司介绍',

        ];
    }

}