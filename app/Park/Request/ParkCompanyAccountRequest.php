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
 * 对公账户信息验证数据类
 */
class ParkCompanyAccountRequest extends MineFormRequest
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
            //税号 验证
            'tax_no' => 'required',
            //单位地址 验证
            'address' => 'required',
            //电话 验证
            'tel' => 'required',
            //开户银行 验证
            'bank_name' => 'required',
            //银行账户 验证
            'bank_no' => 'required',

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [
            //税号 验证
            'tax_no' => 'required',
            //单位地址 验证
            'address' => 'required',
            //电话 验证
            'tel' => 'required',
            //开户银行 验证
            'bank_name' => 'required',
            //银行账户 验证
            'bank_no' => 'required',

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
            'tax_no' => '税号',
            'address' => '单位地址',
            'tel' => '电话',
            'bank_name' => '开户银行',
            'bank_no' => '银行账户',

        ];
    }

}