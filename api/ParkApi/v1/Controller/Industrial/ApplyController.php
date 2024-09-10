<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Industrial;

use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\IndustrialRequest;
use Api\ParkApi\v1\Service\IndustrialService;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PutMapping;

use Mine\Annotation\Auth;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class ApplyController extends BaseController
{
    #[Inject]
    protected IndustrialService $industrialService;
    /**
     * 申请加入企业
     */
    #[PostMapping('Industrial/save')]
    public function apply(IndustrialRequest $request): ResponseInterface
    {
        return $this->success(['id' => $this->industrialService->save($request->all())]);
    }

    /**
     * 产业服务修改.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[PutMapping('Industrial/update/{id}')]
    public function update(int $id, IndustrialRequest $request): ResponseInterface
    {
        return $this->industrialService->update($id, $request->all()) ? $this->success() : $this->error();
    }

    /**
     * 申请详情
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('Industrial/detail/{id}')]
    public function read(int $id):ResponseInterface
    {
        return $this->success($this->industrialService->read($id));
    }

    /**
     * 申请列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('Industrial/list')]
    public function index():ResponseInterface
    {
        return $this->success($this->industrialService->getApplyList());
    }
}
