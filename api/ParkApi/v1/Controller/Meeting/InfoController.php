<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Meeting;


use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\MeetingApplyRequest;
use Api\ParkApi\v1\Service\MeetingService;
use Api\ParkApi\v1\Service\MeetingPriceService;

use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;
#[Controller(prefix: 'api/v1')]
class InfoController extends BaseController
{

    #[Inject]
    protected MeetingService $meetingService;
    #[Inject]
    protected MeetingPriceService $meetingPriceService;
    /**
     * 获取会议室列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('meeting/list')]
    public function list(): ResponseInterface
    {
        return $this->success($this->meetingService->getPageList($this->request->all(),false));
    }

    /**
     * 会议室详情
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('meeting/detail/{id}')]
    public function read(int $id):ResponseInterface
    {
        return $this->success($this->meetingService->getDetail($id));
    }

    /**
     * 基础费用列表
     * @param MeetingApplyRequest $request
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('meeting/base_fee')]
    public function baseFee(MeetingApplyRequest $request) : ResponseInterface
    {
        return $this->success($this->meetingPriceService->getPageList($request->all(),false));
    }
}
