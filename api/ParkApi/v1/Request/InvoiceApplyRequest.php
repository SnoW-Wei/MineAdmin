<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Request;

use Mine\MineFormRequest;

/**
 * 发票申请验证数据类
 */
class InvoiceApplyRequest extends MineFormRequest
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

        ];
    }

}
