<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Property;

use Hyperf\HttpServer\Annotation\GetMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Service\PropertyWarmserviceService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1')]
class WarmserviceController extends BaseController
{
    #[Inject]
    protected PropertyWarmserviceService $propertyWarmserviceService;

    /**
     * 温馨服务列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('warmservice/index')]
    public function index():ResponseInterface
    {
        return $this->success($this->propertyWarmserviceService->getList([],false));
    }
}
