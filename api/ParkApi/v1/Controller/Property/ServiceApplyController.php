<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Property;

use Api\ParkApi\v1\Request\PropertyServiceApplyRequest;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PUtMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Service\PropertyServiceApplyService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Mine\Annotation\Auth;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class ServiceApplyController extends BaseController
{
    #[Inject]
    protected PropertyServiceApplyService $propertyServiceApplyService;

    /**
     * 物业服务申请
     * @param PropertyServiceApplyRequest $request
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PostMapping('property/apply')]
    public function apply(PropertyServiceApplyRequest $request): ResponseInterface
    {
        return $this->success(['id' => $this->propertyServiceApplyService->save($request->all())]);
    }

    /**
     * 物业服务编辑
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PutMapping('property/apply/{id}')]
    public function update(PropertyServiceApplyRequest $request, int $id): ResponseInterface
    {
        return $this->propertyServiceApplyService->update($id,$request->all())? $this->success() : $this->error();
    }

    /**
     * 物业服务详情
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('property/apply/{id}')]
    public function read(int $id):ResponseInterface
    {
        return $this->success($this->propertyServiceApplyService->read($id));
    }

    /**
     * 物业服务列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('property/apply')]
    public function index(PropertyServiceApplyRequest $request):ResponseInterface
    {
        return $this->success($this->propertyServiceApplyService->getApplyList($request->all()));
    }
}
