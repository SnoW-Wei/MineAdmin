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
}
