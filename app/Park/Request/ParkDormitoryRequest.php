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
 * 配套宿舍验证数据类
 */
class ParkDormitoryRequest extends MineFormRequest
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
            //副标题 验证
            'sub_title' => 'required',
            //价格描述 验证
            'price' => 'required',
            //面积 验证
            'area' => 'required',
            //标签 验证
            'tags' => 'required',
            //封面图 验证
            'cover_image' => 'required',
            //轮播图 验证
            'banner_images' => 'required',
            //开发商 验证
            'real_estate' => 'required',
            //物业类型 验证
            'protory_type' => 'required',
            //楼层信息 验证
            'floor' => 'required',
            //联系电话 验证
            'contact_tel' => 'required',

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
            //副标题 验证
            'sub_title' => 'required',
            //价格描述 验证
            'price' => 'required',
            //面积 验证
            'area' => 'required',
            //标签 验证
            'tags' => 'required',
            //封面图 验证
            'cover_image' => 'required',
            //轮播图 验证
            'banner_images' => 'required',
            //开发商 验证
            'real_estate' => 'required',
            //物业类型 验证
            'protory_type' => 'required',
            //楼层信息 验证
            'floor' => 'required',
            //联系电话 验证
            'contact_tel' => 'required',

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
            'sub_title' => '副标题',
            'price' => '价格描述',
            'area' => '面积',
            'tags' => '标签',
            'cover_image' => '封面图',
            'banner_images' => '轮播图',
            'real_estate' => '开发商',
            'protory_type' => '物业类型',
            'floor' => '楼层信息',
            'contact_tel' => '联系电话',

        ];
    }

}