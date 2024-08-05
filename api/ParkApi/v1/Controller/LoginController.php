<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller;
use Api\Interface\UserAuthServiceInterface;
use Api\ParkApi\v1\Service\MpUserService;
use Api\ParkApi\v1\Service\Vo\UserServiceVo;
use EasyWeChat\MiniApp\Application;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Hyperf\Context\ApplicationContext;
use Hyperf\Guzzle\CoroutineHandler;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\GetMapping;

use Mine\Annotation\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Api\ParkApi\v1\Request\MpUserRequest;
use Hyperf\Di\Annotation\Inject;
use Psr\SimpleCache\CacheInterface;

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

    /**
     * 小程序登陆 todo 测试
     * @param MpUserRequest $request
     * @return ResponseInterface
     * @throws \EasyWeChat\Kernel\Exceptions\DecryptException
     * @throws \EasyWeChat\Kernel\Exceptions\HttpException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    #[PostMapping('login/mini')]
    public function miniProgramLogin(MpUserRequest $request): ResponseInterface
    {
        $config = config('wechat.mini_program.default');
        $config['http'] = config('wechat.http');
        $container = ApplicationContext::getContainer();
        $app = new Application($config);
        $handler = new CoroutineHandler();
        $config = $app['config']->get('http', []);
        $config['handler'] = HandlerStack::create($handler);
        $app->rebind('http_client', new Client($config));
        $app['guzzle_handler'] = $handler;
        $app['cache'] = $container->get(CacheInterface::class);

        $utils = $app->getUtils();
        $userinfo = $utils->codeToSession($request->code);
        // $session = $utils->decryptSession($userinfo['sessionKey'], $request->iv, $request->encryptedData);

        //todo
        // 创建账号
        // 获取账号登陆
        return $this->success($userinfo);
    }
}
