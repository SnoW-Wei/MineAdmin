<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\PropertyWarmserviceMapper;
use Mine\Abstracts\AbstractService;

/**
 * 医疗箱-温馨服务服务类
 */
class PropertyWarmserviceService extends AbstractService
{
    /**
     * @var PropertyWarmserviceMapper
     */
    public $mapper;

    public function __construct(PropertyWarmserviceMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * 列表
     * @param array|null $params
     * @param bool $isScope
     * @return array
     */
    public function getList(?array $params = null, bool $isScope = true): array
    {
        $data = $this->mapper->getList($params,false);
        return $data;
    }
}
