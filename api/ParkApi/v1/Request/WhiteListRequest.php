<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Request;

use Mine\MineFormRequest;

/**
 * 白名单验证数据类
 */
class WhiteListRequest extends MineFormRequest
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
            //手机号 验证
            'phone' => 'required',

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [
            //手机号 验证
            'phone' => 'required',
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
            'phone' => '手机号',

        ];
    }

}
