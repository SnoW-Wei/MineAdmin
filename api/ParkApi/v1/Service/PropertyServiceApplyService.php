<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\PropertyServiceApplyMapper;
use Api\ParkApi\v1\Mapper\PropertyServiceTypeMapper;
use Carbon\Carbon;
use Mine\Abstracts\AbstractService;

/**
 * 服务类型服务类
 */
class PropertyServiceApplyService extends AbstractService
{
    /**
     * @var PropertyServiceApplyMapper
     */
    public $mapper;
    public $propertyServiceTypeMapper;

    public function __construct(PropertyServiceApplyMapper $mapper, PropertyServiceTypeMapper $propertyServiceTypeMapper)
    {
        $this->mapper = $mapper;
        $this->propertyServiceTypeMapper = $propertyServiceTypeMapper;
    }

    /**
     * 列表
     * @param $data
     * @return array
     */
    public function getApplyList($data): array
    {
        if (isset($data['type_id']) && filled($data['type_id'])) {
            $d = [
                'parent_id' => $data['type_id']
            ];

            $ret = $this->propertyServiceTypeMapper->getList($d,false);
            foreach($ret AS $value)
            {
                $ids[] = $value['id'];
            }
        }
        $params = [
            'user_id' => user('xcx')->getId(),
            'orderBy' => 'created_at',
            'orderType' => 'desc',
            'type_id' => $ids
        ];
        return $this->mapper->getPageList($params);
    }

    /**
     * 保存
     * @param array $data
     * @return mixed
     */
    public function save(array $data): mixed
    {
        $data['user_id'] = user('xcx')->getId();
        $data['user_name'] = user('xcx')->getUserInfo()['nick_name']??'';
        $data['phone'] = user('xcx')->getUserInfo()['phone'];
        $data['apply_date'] = Carbon::now()->toDateTimeString();

        return $this->mapper->save($data);
    }
}
