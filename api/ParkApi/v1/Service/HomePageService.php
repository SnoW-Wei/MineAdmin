<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\HomePageMapper;
use Mine\Abstracts\AbstractService;

class HomePageService extends AbstractService
{
    /**
     * @var ParkBannerMapper
     */
    public $mapper;
    public function __construct(HomePageMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}
