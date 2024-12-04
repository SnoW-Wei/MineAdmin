<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\IndustrialCategoryMapper;
use Mine\Abstracts\AbstractService;

/**
 * 服务类型服务类
 */
class IndustrialCategoryService extends AbstractService
{
    /**
     * @var IndustrialCategoryMapper
     */
    public $mapper;

    public function __construct(IndustrialCategoryMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}
