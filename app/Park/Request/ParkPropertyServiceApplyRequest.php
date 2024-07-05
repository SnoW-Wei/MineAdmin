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
 * 服务申请验证数据类
 */
class ParkPropertyServiceApplyRequest extends MineFormRequest
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
            //申请状态 验证
            'apply_status' => 'required',

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
            'user_id' => '用户ID',
            'user_name' => '用户名称',
            'phone' => '联系电话',
            'company' => '公司名称',
            'level' => '报修级别',
            'content' => '描述内容',
            'type_id' => '服务类型',
            'apply_date' => '申请时间',
            'apply_status' => '申请状态',

        ];
    }

}