<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Dormitory;

use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\DormitoryRequest;
use Api\ParkApi\v1\Service\DormitoryService;
use Hyperf\HttpServer\Annotation\GetMapping;


use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1')]
class InfoController extends BaseController
{
    #[Inject]
    protected DormitoryService $dormitoryService;
    /**
     * 宿舍列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('dormitory/list')]
    public function index(): ResponseInterface
    {
        $param['select'] = 'id,title,sub_title,price,tags,cover_image';
        return $this->success($this->dormitoryService->getPageList($param,false));
    }

    /**
     * 宿舍详情
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping('dormitory/detail/{id}')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->dormitoryService->read($id));
    }
}
