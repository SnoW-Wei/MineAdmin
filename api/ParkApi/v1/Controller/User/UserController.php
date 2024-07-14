<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\User;

use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\MpUserRequest;
use Api\ParkApi\v1\Service\MpUserService;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PutMapping;

use Mine\Annotation\Auth;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class UserController extends BaseController
{
    #[Inject]
    protected MpUserService $mpUserService;

    /**
     * 更新用户信息
     * @param MpUserRequest $request
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PutMapping('user/info')]
    public function update(MpUserRequest $request): ResponseInterface
    {
        return $this->mpUserService->update(user('xcx')->getId(),$request->all()) ? $this->success() : $this->error();
    }

    /**
     * 修改密码
     * @param MpUserRequest $request
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PutMapping('user/pwd')]
    public function updatePwd(MpUserRequest $request): ResponseInterface
    {
        return $this->mpUserService->modifyPassword($request->all()) ? $this->success() : $this->error();
    }
}
