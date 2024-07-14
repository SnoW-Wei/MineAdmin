<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Request;
use Mine\MineFormRequest;

class MpUserRequest extends MineFormRequest
{
    /**
     * 登录规则.
     * @return string[]
     */
    public function loginRules(): array
    {
        return [
            'xcx_open_id' => 'required|max:20',
            'password' => 'required|min:6',
        ];
    }

    /**
     * 修改密码验证规则
     * return array.
     */
    public function modifyPasswordRules(): array
    {
        return [
            'newPassword' => 'required|max:20|min:6',
        ];
    }

    /**
     * 字段映射名称
     * return array.
     */
    public function attributes(): array
    {
        return [
            'id' => '用户ID',
            'header_image' => '头像',
            'nick_name' => '昵称',
            'gender' => '性别',
            'real_name' => '真实名称',
            'compay_name' => '公司名称',
            'phone' => '手机',
            'email' => '邮箱',
        ];
    }
}
