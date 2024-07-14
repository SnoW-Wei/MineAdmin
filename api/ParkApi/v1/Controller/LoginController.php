<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller;
use Api\Interface\UserAuthServiceInterface;
use Api\ParkApi\v1\Service\MpUserService;
use Api\ParkApi\v1\Service\Vo\UserServiceVo;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\GetMapping;

use Mine\Annotation\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Api\ParkApi\v1\Request\MpUserRequest;
use Hyperf\Di\Annotation\Inject;

#[Controller(prefix: 'api/v1')]
class LoginController extends BaseController
{
    #[Inject]
    protected UserAuthServiceInterface $userAuthService;
    #[Inject]
    protected MpUserService $mpUserService;

    #[PostMapping("login/in")]
    public function login(MpUserRequest $request): ResponseInterface
    {
        $requestData = $request->validated();
        $vo = new UserServiceVo();
        $vo->setXcxopenid($requestData['xcx_open_id']);
        $vo->setPassword($requestData['password']);
        return $this->success(['token' => $this->userAuthService->login($vo)]);
    }

    /**
     * 用户信息.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('login/self'), Auth('xcx')]
    public function getInfo(): ResponseInterface
    {
        return $this->success($this->mpUserService->getInfo());
    }
}
