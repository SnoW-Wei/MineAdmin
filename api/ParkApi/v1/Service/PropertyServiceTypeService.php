<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\PropertyServiceTypeMapper;
use Mine\Abstracts\AbstractService;

/**
 * 服务类型服务类
 */
class PropertyServiceTypeService extends AbstractService
{
    /**
     * @var PropertyServiceTypeMapper
     */
    public $mapper;

    public function __construct(PropertyServiceTypeMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getTypesById(int $id): array
    {
        return $this->mapper->getTypesById($id);
    }
}
