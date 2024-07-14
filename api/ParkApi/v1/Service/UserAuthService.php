<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Service;

use Api\Interface\UserAuthServiceInterface;
use Api\ParkApi\v1\Mapper\MpUserMapper;
use Hyperf\Database\Model\ModelNotFoundException;
use Mine\Annotation\DependProxy;
use Mine\Event\UserLoginAfter;
use Mine\Event\UserLoginBefore;
use Mine\Exception\NormalStatusException;
use Mine\Exception\UserBanException;
use Mine\Helper\MineCode;
use Api\ParkApi\v1\Service\Vo\UserServiceVo;

#[DependProxy(values: [UserAuthServiceInterface::class])]
class UserAuthService implements UserAuthServiceInterface
{
    public function login(UserServiceVo $userServiceVo): string
    {
        $mapper = container()->get(MpUserMapper::class);
        try {
            event(new UserLoginBefore(['xcx_open_id' => $userServiceVo->getXcxopenid(), 'password' => $userServiceVo->getPassword()]));
            $userinfo = $mapper->checkUserByOpenId($userServiceVo->getXcxopenid())->toArray();
            $userinfo['scene'] = 'xcx';
            $password = $userinfo['password'];
            unset($userinfo['password']);
            $userLoginAfter = new UserLoginAfter($userinfo);
            if ($mapper->checkPass($userServiceVo->getPassword(), $password)) {
                $userLoginAfter->message = t('jwt.login_success');
                $token = user('xcx')->getToken($userLoginAfter->userinfo);
                $userLoginAfter->token = $token;
                event($userLoginAfter);
                return $token;
            }

            $userLoginAfter->loginStatus = false;
            $userLoginAfter->message = t('jwt.login_error');
            event($userLoginAfter);
            throw new NormalStatusException();
        }catch (\Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                throw new NormalStatusException(t('jwt.login_error'), MineCode::NO_USER);
            }
            if ($e instanceof NormalStatusException) {
                throw new NormalStatusException(t('jwt.login_error'), MineCode::NO_USER);
            }
            if ($e instanceof UserBanException) {
                throw new NormalStatusException(t('jwt.user_ban'), MineCode::USER_BAN);
            }
            console()->error($e->getMessage());
            throw new NormalStatusException(t('jwt.unknown_error'));
        }
    }

    public function logout()
    {

    }
}
