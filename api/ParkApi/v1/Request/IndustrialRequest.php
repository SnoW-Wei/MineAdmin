<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Request;

use Mine\MineFormRequest;

class IndustrialRequest extends MineFormRequest
{

    /**
     * 新增数据验证规则
     * return array
     */
    public function saveRules(): array
    {
        return [
            'category_id' => 'required',
            'user_name' => 'required',
            'compay' => 'required',
            'phone' => 'required',
            'remark' => 'required',
        ];
    }

    /**
     * 字段映射名称
     * return array.
     */
    public function attributes(): array
    {
        return [
            'service_id' => '申请服务',
            'category_id' => '申请服务类型',
            'user_name' => '昵称',
            'phone' => '手机',
            'email' => '邮箱',
            'compay' => '公司名称',
            'remark' => '备注'
        ];
    }
}
