<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Property;


use Api\ParkApi\v1\Request\PropertyWarmserviceRentRequest;
use Hyperf\HttpServer\Annotation\GetMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Service\PropertyWarmserviceRentService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1')]
class WarmserviceRentController extends BaseController
{
    #[Inject]
    protected PropertyWarmserviceRentService $propertyWarmserviceRentService;

    /**
     * 租赁列表查询
     */
    #[GetMapping('rent/index')]
    public function index(PropertyWarmserviceRentRequest $request):ResponseInterface
    {
        return $this->success($this->propertyWarmserviceRentService->getList($request->all(),false));
    }

    /**
     * 租赁详情查询
     */
    #[GetMapping('rent/{id}')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->propertyWarmserviceRentService->read($id));
    }
}
