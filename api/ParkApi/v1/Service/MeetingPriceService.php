<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\MeetingPriceMapper;
use Mine\Abstracts\AbstractService;

/**
 * 会议室基本费用服务类
 */
class MeetingPriceService extends AbstractService
{
    /**
     * @var MeetingPriceMapper
     */
    public $mapper;

    public function __construct(MeetingPriceMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}
