<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Api\ParkApi\v1\Service\Vo;

class UserServiceVo
{

    /**
     * 密码
     */
    protected string $password;

    /**
     * 手机.
     */
    protected string $phone;

    /**
     * 邮箱.
     */
    protected string $email;

    protected string $mp_open_id;

    protected string $xcx_open_id;

    protected string $union_open_id;

    protected string $real_name;

    protected string $nick_name;

    protected string $compay_name;

    protected string $header_image;

    protected string $gender;


    public function getXcxopenid(): string
    {
        return $this->xcx_open_id;
    }

    public function setXcxopenid(string $Xcxopenid): void
    {
        $this->xcx_open_id = $Xcxopenid;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
