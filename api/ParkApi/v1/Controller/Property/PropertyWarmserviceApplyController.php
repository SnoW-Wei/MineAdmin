<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Property;

use Api\ParkApi\v1\Request\PropertyWarmserviceApplyRequest;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Service\PropertyWarmserviceApplyService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Mine\Annotation\Auth;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class PropertyWarmserviceApplyController extends BaseController
{
    #[Inject]
    protected PropertyWarmserviceApplyService $propertyWarmserviceApplyService;

    /**
     * 温馨服务申请列表查询
     */
    #[GetMapping('warm/index')]
    public function index(PropertyWarmserviceApplyRequest $request):ResponseInterface
    {
        return $this->success($this->propertyWarmserviceApplyService->getApplyList($request->all()));
    }

    /**
     * 温馨服务申请详情查询
     */
    #[GetMapping('warm/{id}')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->propertyWarmserviceApplyService->read($id));
    }

    /**
     * 温馨服务申请
     * @param PropertyWarmserviceApplyRequest $request
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PostMapping('warm/apply')]
    public function apply(PropertyWarmserviceApplyRequest $request): ResponseInterface
    {
        return $this->success(['id' => $this->propertyWarmserviceApplyService->save($request->all())]);
    }

    /**
     * 修改服务申请
     * @param PropertyWarmserviceApplyRequest $request
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PutMapping('warm/apply/{id}')]
    public function update(PropertyWarmserviceApplyRequest $request, int $id): ResponseInterface
    {
        return $this->propertyWarmserviceApplyService->update($id,$request->all())? $this->success() : $this->error();
    }
}
