<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Api\ParkApi\v1\Controller\Meeting;

use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\MeetingApplyRequest;
use Api\ParkApi\v1\Service\MeetingApplyService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;
use Mine\Annotation\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class ApplyController extends BaseController
{
    #[Inject]
    protected MeetingApplyService $meetingApplyService;

    /**
     * 会议室申请列表.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('meeting/apply')]
    public function index(MeetingApplyRequest $request): ResponseInterface
    {
        return $this->success($this->meetingApplyService->getPageList($request->all()));
    }

    /**
     * 会议室申请详情.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('meeting/apply/{id}')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->meetingApplyService->read($id));
    }

    /**
     * 会议室申请修改.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[PutMapping('meeting/apply/{id}')]
    public function update(int $id, MeetingApplyRequest $request): ResponseInterface
    {
        return $this->meetingApplyService->update($id, $request->all()) ? $this->success() : $this->error();
    }

    /**
     * 会议室申请.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[PostMapping('meeting/apply')]
    public function apply(MeetingApplyRequest $request): ResponseInterface
    {
        return $this->success(['id' => $this->meetingApplyService->save($request->all())]);
    }

    /**
     * 会议室日历
     * @param MeetingApplyRequest $request
     * @return ResponseInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('meeting/calendar_apply')]
    public function calendarApply(MeetingApplyRequest $request): ResponseInterface
    {
        return $this->success($this->meetingApplyService->getCalendarApplyList($request->all()));
    }
}
