<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\Meeting;
use Mine\Abstracts\AbstractMapper;

/**
 * 详情配置Mapper类
 */
class MeetingMapper extends AbstractMapper
{
    /**
     * @var Meeting
     */
    public $model;

    public function assignModel()
    {
        $this->model = Meeting::class;
    }
}
