<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Common;

use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\WhiteListRequest;
use Api\ParkApi\v1\Service\WhiteListService;
use Hyperf\HttpServer\Annotation\GetMapping;


use Mine\Annotation\Auth;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class WhiteListController extends BaseController
{
    #[Inject]
    protected WhiteListService $service;

    /**
     * 检测白名单.
     * @throws FileExistsException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('whitelist/check')]
    public function check(WhiteListRequest $request): ResponseInterface
    {
        return $this->success([$this->service->getDetail($request->all())]);
    }
}
