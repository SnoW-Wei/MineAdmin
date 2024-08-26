<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller;
use Api\Interface\UserAuthServiceInterface;
use Api\ParkApi\v1\Service\BaoiqiService;
use Api\ParkApi\v1\Service\MpUserService;
use Api\ParkApi\v1\Service\Vo\UserServiceVo;
use EasyWeChat\Factory;
use EasyWeChat\MiniApp\Application;

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
    #[Inject]
    protected BaoiqiService $baoiqiService;


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
        $code = $request->input('code');

        $config = config('wechat');
        $app = Factory::miniProgram($config);
        $app['guzzle_handler'] = CoroutineHandler::class;
        $userinfo = $app->auth->session($code);

        $phone = $app->phone_number->getUserPhoneNumber($code);
        print_r($phone);
        if(!isset($phone['phone_info']) || !array_key_exists('purePhoneNumber',$phone['phone_info'])){
            return $this->error('获取小程序用户信息失败');
        }
        $phone = $phone['phone_info']['purePhoneNumber'];
        $stuInfo = $this->mpUserService->getInfoByPhone((int)$phone);

        if($stuInfo){
            $stuInfo->updated_at = date("Y-m-d H:i:s");
            $stuInfo->save();
        } else {
            $stu['phone'] = $phone;
            $stu['password'] = PASSWORD_USER;
            $this->mpUserService->save($stu);
        }

        $vo = new UserServiceVo();
        $vo->setPhone($phone);
        $vo->setPassword(PASSWORD_USER);
        return $this->success(['token' => $this->userAuthService->login($vo)]);
    }

    /**
     * 宝i企登陆
     * @param MpUserRequest $request
     * @return ResponseInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[PostMapping('login/baoiqi')]
    public function baoIQi(MpUserRequest $request): ResponseInterface
    {
        $data_json = $request->input('data');
        $data = json_decode($data_json,true);

        $phone = $this->baoiqiService->decrypt($data['mobileAes']);
        $username = $data['userName'];
        $stuInfo = $this->mpUserService->getInfoByPhone((int)$phone);
        if($stuInfo){
            $stuInfo->real_name = $username;
            $stuInfo->updated_at = date("Y-m-d H:i:s");
            $stuInfo->save();
            $phone = $stuInfo->phone;
        } else {
            $stu['phone'] = $phone;
            $stu['real_name'] = $username;
            $stu['password'] = PASSWORD_USER;
            $this->mpUserService->save($stu);
        }

        $vo = new UserServiceVo();
        $vo->setPhone($phone);
        $vo->setPassword(PASSWORD_USER);

        $data = ['uid'=> snowflake_id(),'token' => $this->userAuthService->login($vo)];
        $redis = redis();
        $redis->set($data['uid'],$data['token'],['nx','ex'=>300]);
        return $this->success($data);
    }

    /**
     * 宝i企中转跳转
     * @param MpUserRequest $request
     * @return ResponseInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws \RedisException
     */
    #[GetMapping('login/exchange')]
    public function exchange(MpUserRequest $request): ResponseInterface
    {
        $uid = $request->input('uid');
        $redis = redis();
        $token = $redis->get($uid);

        return $this->success(['uid'=>$uid,'token'=>$token]);
    }
}
