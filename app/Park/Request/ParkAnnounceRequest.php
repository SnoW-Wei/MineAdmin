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
 * 公告验证数据类
 */
class ParkAnnounceRequest extends MineFormRequest
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
            //公告标题 验证
            'title' => 'required',
            //公告内容 验证
            'content' => 'required',
            //发布时间 验证
            'sub_date' => 'required',
            //公告类型 验证
            'type' => 'required',

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [
            //公告标题 验证
            'title' => 'required',
            //公告内容 验证
            'content' => 'required',
            //发布时间 验证
            'sub_date' => 'required',
            //公告类型 验证
            'type' => 'required',

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
            'title' => '公告标题',
            'content' => '公告内容',
            'sub_date' => '发布时间',
            'type' => '公告类型',

        ];
    }

}