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
 * 产业新闻验证数据类
 */
class ParkNewsArticleRequest extends MineFormRequest
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
            //新闻内容 验证
            'content' => 'required',
            //发布时间 验证
            'public_at' => 'required',
            //排序 验证
            'sort' => 'required',
            //新闻图片 验证
            'images' => 'required',

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
            //新闻内容 验证
            'content' => 'required',
            //发布时间 验证
            'public_at' => 'required',
            //排序 验证
            'sort' => 'required',
            //新闻图片 验证
            'images' => 'required',

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
            'content' => '新闻内容',
            'public_at' => '发布时间',
            'sort' => '排序',
            'images' => '新闻图片',

        ];
    }

}