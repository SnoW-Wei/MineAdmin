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
use App\Setting\Service\SettingConfigService;
use App\System\Service\SystemUserService;
use App\System\Vo\AmqpQueueVo;
use App\System\Vo\QueueMessageVo;
use Hyperf\Cache\Listener\DeleteListenerEvent;
use Hyperf\Context\ApplicationContext;
use Mine\Interfaces\ServiceInterface\QueueLogServiceInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

if (! function_exists('env')) {
    /**
     * 获取环境变量信息.
     */
    function env(string $key, mixed $default = null): mixed
    {
        return \Hyperf\Support\env($key, $default);
    }
}

if (! function_exists('config')) {
    /**
     * 获取配置信息.
     */
    function config(string $key, mixed $default = null): mixed
    {
        return \Hyperf\Config\config($key, $default);
    }
}

if (! function_exists('make')) {
    /**
     * Create an object instance, if the DI container exist in ApplicationContext,
     * then the object will be created by DI container via `make()` method, if not,
     * the object will create by `new` keyword.
     */
    function make(string $name, array $parameters = [])
    {
        return \Hyperf\Support\make($name, $parameters);
    }
}

if (! function_exists('sys_config')) {
    /**
     * 获取后台系统配置.
     *
     * @throws RedisException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function sys_config(string $key, mixed $default = null): mixed
    {
        return container()->get(SettingConfigService::class)->getConfigByKey($key) ?? $default;
    }
}

if (! function_exists('sys_group_config')) {
    /**
     * 获取后台系统配置.
     *
     * @param null|mixed $default
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function sys_group_config(string $groupKey, mixed $default = []): mixed
    {
        return container()->get(SettingConfigService::class)->getConfigByGroupKey($groupKey) ?? $default;
    }
}

if (! function_exists('push_queue_message')) {
    /**
     * 推送消息到队列.
     * @throws Throwable
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function push_queue_message(QueueMessageVo $message, array $receiveUsers = []): bool
    {
        return container()
            ->get(QueueLogServiceInterface::class)
            ->pushMessage($message, $receiveUsers);
    }
}

if (! function_exists('add_queue')) {
    /**
     * 添加任务到队列.
     * @throws Throwable
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function add_queue(AmqpQueueVo $amqpQueueVo): bool
    {
        return container()
            ->get(QueueLogServiceInterface::class)
            ->addQueue($amqpQueueVo);
    }
}

if (! function_exists('delete_cache')) {
    /**
     * 删除框架自带的注解缓存.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function delete_cache(string $prefix, array $args): void
    {
        ApplicationContext::getContainer()
            ->get(EventDispatcherInterface::class)
            ->dispatch(new DeleteListenerEvent(
                $prefix,
                $args
            ));
    }
}

if (! function_exists('is_in_container')) {
    function is_in_container(): bool
    {
        if (file_exists('/.dockerenv')) {
            return true;
        }
        $cgroup = file_get_contents('/proc/1/cgroup');
        return strpos($cgroup, 'kubepods') > 0 || strpos($cgroup, 'docker') > 0;
    }
}

if (! function_exists('has_permission')) {
    /**
     * 检查用户是否拥有某权限.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function has_permission(string $code, ?int $userId = null): bool
    {
        $codes = container()->get(SystemUserService::class)->getInfo($userId)['codes'];
        if ($codes[0] === '*') {
            return true;
        }
        return in_array($code, $codes);
    }
}

if (! function_exists('has_role')) {
    /**
     * 检查用户是否拥有某角色.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function has_role(string $code, ?int $userId = null): bool
    {
        $roles = container()->get(SystemUserService::class)->getInfo($userId)['roles'];
        if ($roles === 'superAdmin') {
            return true;
        }
        return in_array($code, $roles);
    }
}

/**
 * curl方式的 GET 请求，传入完整的url带上参数
 *
 * @param string $url
 * @param array $param
 * @return string content
 */
if (!function_exists('curlGetRequest')) {
    function curlGetRequest($url,$header=array())
    {
        $curl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        }

        if(!empty($headers))
        {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.00; Windows 98)');


        $content = curl_exec($curl);
        $status = curl_getinfo($curl);
        curl_close($curl);
        if (intval($status["http_code"]) == 200) {
            return $content;
        } else {
            return false;
        }
    }
}

/**
 * curl方式的 POST 请求
 *
 * @param string $url
 * @param array $param
 * @return string content
 */
if (!function_exists('curlPostRequest')) {
    function curlPostRequest($url, $param, $headers=array())
    {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (is_string($param)) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach ($param as $key => $val) {
                $aPOST [] = $key . "=" . urlencode($val);
            }
            $strPOST = join("&", $aPOST);
        }

        curl_setopt($oCurl, CURLOPT_URL, $url);
        if(!empty($headers))
        {
            curl_setopt($oCurl, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($oCurl, CURLOPT_HEADER, 0);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        if ($strPOST) {
            curl_setopt($oCurl, CURLOPT_POST, 1);
            curl_setopt($oCurl, CURLOPT_POSTFIELDS, $strPOST);
        }

        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);


        if (intval($aStatus ["http_code"]) == 200 || !empty($headers)) {
            // restful 接口返回的状态码非 200
            return $sContent;
        } else {
            return false;
        }
    }
}
