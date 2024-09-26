<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Controller;

use Api\ParkApi\v1\Service\SystemDictDataService;
use Api\ParkApi\v1\Service\PropertyServiceTypeService;
use Api\ParkApi\v1\Service\industrialCategoryService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Mine\MineController;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * 字典类型控制器
 * Class LogsController.
 */
#[Controller(prefix: 'api/v1')]
class DictDataController extends MineController
{
    #[Inject]
    protected SystemDictDataService $service;

    #[Inject]
    protected PropertyServiceTypeService $propertyServiceType;

    #[Inject]
    protected industrialCategoryService $industrialCategoryService;
    /**
     * 快捷查询一个字典.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('dataDict/list')]
    public function list(): ResponseInterface
    {
        $code = $this->request->all();
        $code_arr = explode(',',$code['code']);
        foreach($code_arr AS $value) {
            switch ($value)
            {
                case 'property_service_type':
                    $param['select'] = 'id,name';
                    $ret =  $this->propertyServiceType->getList($param,false);
                    break;
                case 'industrial_service_category';
                    $param['select'] = 'id,name';
                    $ret =  $this->industrialCategoryService->getList($param,false);
                    break;
                default:
                    $ret = $this->service->getList(['code'=>$value],false);
                    break;
            }
            $return[$value] = $ret;
        }
        return $this->success($return);
    }

    /**
     * 获取一个字典类型数据.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[GetMapping('dataDict/read/{id}')]
    public function read(int $id): ResponseInterface
    {
        return $this->success($this->service->read($id));
    }

}
