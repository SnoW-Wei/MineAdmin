<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Property;

use Api\ParkApi\v1\Request\PropertyWarmserviceMedicalRequest;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Service\PropertyWarmserviceMedicalService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1')]
class WarmserviceMedicalController extends BaseController
{
    #[Inject]
    protected PropertyWarmserviceMedicalService $propertyWarmserviceMedicalService;

    /**
     * 租赁列表查询
     */
    #[GetMapping('medical/index')]
    public function index(PropertyWarmserviceMedicalRequest $request):ResponseInterface
    {
        return $this->success($this->propertyWarmserviceMedicalService->getList($request->all(),false));
    }

    /**
     * 租赁详情查询
     */
    #[GetMapping('medical/{id}')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->propertyWarmserviceMedicalService->read($id));
    }
}
