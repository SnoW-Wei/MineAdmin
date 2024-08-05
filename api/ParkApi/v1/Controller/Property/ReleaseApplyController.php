<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Property;

use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PutMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\PropertyReleaseApplyRequest;
use Api\ParkApi\v1\Service\PropertyReleaseApplyService;
use Mine\Annotation\Auth;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class ReleaseApplyController extends BaseController
{
    #[Inject]
    protected PropertyReleaseApplyService $propertyReleaseApplyService;

    /**
     * 物品放行申请
     * @param PropertyReleaseApplyRequest $request
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PostMapping('property/release')]
    public function apply(PropertyReleaseApplyRequest $request): ResponseInterface
    {
        return $this->success(['id' => $this->propertyReleaseApplyService->save($request->all())]);
    }

    /**
     * 取消申请
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PutMapping('property/release/{id}')]
    public function update(int $id): ResponseInterface
    {
        return $this->propertyReleaseApplyService->update($id,[])? $this->success() : $this->error();
    }

    /**
     * 物品放行详情 // todo 生成二维码
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('property/release/{id}')]
    public function read(int $id):ResponseInterface
    {
        return $this->success($this->propertyReleaseApplyService->read($id));
    }

    /**
     * 物品放行列表 todo 时间范围筛选
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('property/release')]
    public function index(PropertyReleaseApplyRequest $request):ResponseInterface
    {
        return $this->success($this->propertyReleaseApplyService->getApplyList($request->all()));
    }
}
