<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Controller\Meeting;

use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\InvoiceApplyRequest;
use Api\ParkApi\v1\Service\InvoiceApplyService;
use Mine\Annotation\Auth;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;
#[Controller(prefix: 'api/v1'), Auth('xcx')]
class InvoiceController extends BaseController
{
    #[Inject]
    protected InvoiceApplyService $invoiceApplyService;

    /**
     * 发票详情
     * @param int $id 会议室申请的订单号
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('invoice/apply/{id}')]
    public function read(int $id):ResponseInterface
    {
        return $this->success($this->invoiceApplyService->readOne($id));
    }

    /**
     * 发票申请
     * @param MeetingApplyRequest $request
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PostMapping('invoice/apply')]
    public function apply(InvoiceApplyRequest $request): ResponseInterface
    {
        $data = $request->all();
        $data['type'] = 1; // 会议室发票申请
        return $this->success(['id' => $this->invoiceApplyService->save($data)]);
    }


}
