<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\MeetingMapper;
use Api\ParkApi\v1\Mapper\MeetingPackageMapper;
use Api\ParkApi\v1\Mapper\MeetingPriceMapper;
use Mine\Abstracts\AbstractService;
use Mine\MineModel;

/**
 * 详情配置服务类
 */
class MeetingService extends AbstractService
{
    /**
     * @var MeetingMapper
     */
    public $mapper;
    public $priceMapper;
    public $packageMapper;

    public function __construct(
        MeetingMapper $mapper,
        MeetingPriceMapper $priceMapper,
        MeetingPackageMapper $packageMapper
    )
    {
        $this->mapper = $mapper;
        $this->priceMapper = $priceMapper;
        $this->packageMapper = $packageMapper;
    }

    /**
     * 会议室详情
     * @param mixed $id
     * @param array $column
     * @return MineModel|null
     */
    public function getDetail(mixed $id, array $column = ['*']) : array
    {
        $meeting = $this->mapper->getModel()->find($id);
        $data['base_info'] = $meeting->toArray();
        foreach($data['base_info']['time_period'] AS $val) {
            $price = $this->priceMapper->read($val);
            if($price) {
                $data['price'][] = $price;
            }
        }
        $data['base_config'] = $meeting->baseConfig;

        foreach($data['base_info']['platinum_config'] AS $val) {
            $data['platinum_config'][] = $this->packageMapper->read($val);
        }

        return $data;
    }
}
