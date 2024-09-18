<?php

declare(strict_types=1);
namespace Api\ParkApi\v1\Controller\Payment;

use EasyWeChat\Factory;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Mine\MineController;

/**
 * Class PaymentsController.
 */
#[Controller(prefix: 'api/v1')]
class PaymentsController extends MineController
{
    #[GetMapping('unify/apply')]
    public function unify()
    {
        $wechat_open = config('wechat.is_open');
        if (! $wechat_open) {
            return $this->error('微信支付暂未开通');
        }

        // 微信发起统一支付
        $config = config('wechat.payment.default');
        $payment = Factory::payment($config);

        $order = [
            'trade_type' => 'JSAPI', // 支付类型，如 JSAPI、NATIVE、APP
            'body' => '测试商品',
            'out_trade_no' => '订单编号',
            'total_fee' => 100, // 支付金额，单位为分
            'openid' => '用户的 openid',
            'notify_url' => $config['notify_url'], // 通知地址
        ];

        $result = $payment->order->unify($order);
    }
}
