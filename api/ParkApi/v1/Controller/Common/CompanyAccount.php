<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Common;

use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\CompanyAccountRequest;
use Api\ParkApi\v1\Service\CompanyAccountService;
use Hyperf\HttpServer\Annotation\GetMapping;


use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1')]
class CompanyAccount extends BaseController
{
    #[Inject]
    protected CompanyAccountService $service;

    /**
     * 检测白名单.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('company/account')]
    public function check(CompanyAccountRequest $request): ResponseInterface
    {
        return $this->success($this->service->readOne());
    }
}
