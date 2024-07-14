<?php

declare(strict_types=1);

namespace Api\Interface;

use Api\ParkApi\v1\Service\Vo\UserServiceVo;

/**
 * 用户服务抽象
 */
interface UserAuthServiceInterface
{
    public function login(UserServiceVo $userServiceVo);

    public function logout();
}
