<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Property;


use Hyperf\HttpServer\Annotation\GetMapping;
use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Service\PropertyServiceTypeService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1')]
class ServiceTypeController extends BaseController
{
    #[Inject]
    protected PropertyServiceTypeService $propertyServiceTypeService;

    /**
     * 子分类查询
     */
    #[GetMapping('property/category/{id}')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->propertyServiceTypeService->getTypesById($id));
    }
}
