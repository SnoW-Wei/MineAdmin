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

namespace Api\ParkApi\v1\Controller;

use Mine\MineRequest;
use Mine\MineResponse;
use Mine\Traits\ControllerTrait;

/**
 * 控制器基类
 * Class MineController.
 */
abstract class BaseController
{
    use ControllerTrait;

    public function __construct(
        readonly protected MineRequest $request,
        readonly protected MineResponse $response
    ) {}

    public function getResponse(): MineResponse
    {
        return $this->response;
    }

    public function getRequest(): MineRequest
    {
        return $this->request;
    }
}
