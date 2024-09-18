<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Payment;

use Api\ParkApi\v1\Service\SystemDictDataService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Mine\MineController;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class LogsController.
 */
#[Controller(prefix: 'api/v1')]
class NotifyController extends MineController
{
    /**
     * 支付回调.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[PostMapping('notify/apply')]
    public function notify(): ResponseInterface
    {
        return $this->success([]);
    }

}
