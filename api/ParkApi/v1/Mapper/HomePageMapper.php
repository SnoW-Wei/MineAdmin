<?php

declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use App\Park\Model\ParkBanner;
use Mine\Abstracts\AbstractMapper;

/**
 * banner图Mapper类
 */
class HomePageMapper extends AbstractMapper
{
    /**
     * @var ParkBanner
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkBanner::class;
    }
}
