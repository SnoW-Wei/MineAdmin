<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\PropertyServiceApplyMapper;
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

    public function __construct(PropertyServiceApplyMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function save(array $data): mixed
    {
        $data['user_id'] = user('xcx')->getId();
        $data['user_name'] = user('xcx')->getUserInfo()['nick_name'];
        $data['phone'] = user('xcx')->getUserInfo()['phone'];
        $data['apply_date'] = Carbon::now()->toDateTimeString();

        return $this->mapper->save($data);
    }
}
