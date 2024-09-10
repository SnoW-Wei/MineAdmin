<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\DormitoryMapper;
use Mine\Abstracts\AbstractService;

/**
 * 配套宿舍服务类
 */
class DormitoryService extends AbstractService
{
    /**
     * @var DormitoryMapper
     */
    public $mapper;

    public function __construct(DormitoryMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}
