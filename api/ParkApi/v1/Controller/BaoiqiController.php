<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Controller;

use Api\ParkApi\v1\Request\CommonRequest;
use Api\ParkApi\v1\Service\BaoiqiService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Mine\MineController;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * 字典类型控制器
 * Class LogsController.
 */
#[Controller(prefix: 'api/v1')]
class BaoiqiController extends MineController
{
    #[Inject]
    protected BaoiqiService $service;

    /**
     * H5认证
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('biq/getAccessToken')]
    public function getAccessToken(CommonRequest $request): ResponseInterface
    {
        return $this->success($this->service->getAccessToken($this->request->all()));
    }

    /**
     * 解密手机号
     * @param CommonRequest $request
     * @return ResponseInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('biq/aesDecrypt')]
    public function aesDecrypt(CommonRequest $request): ResponseInterface
    {
        return $this->success($this->service->decrypt($this->request->all()));
    }

    /**
     * 获取登录信息
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('biq/curUser')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->service->read($id));
    }

}
