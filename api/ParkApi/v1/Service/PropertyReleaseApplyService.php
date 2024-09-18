<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\PropertyReleaseApplyMapper;
use Api\ParkApi\v1\Model\PropertyReleaseApply;
use Mine\Abstracts\AbstractService;

/**
 * 物品放行服务类
 */
class PropertyReleaseApplyService extends AbstractService
{
    /**
     * @var PropertyReleaseApplyMapper
     */
    public $mapper;

    public function __construct(PropertyReleaseApplyMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * 获取用户申请列表.
     * @return array
     */
    public function getApplyList(array $data): array
    {
        $params = [
            'orderBy' => 'created_at',
            'orderType' => 'desc',
            'user_id' => user('xcx')->getId()
        ];

        if( isset($data['apply_date']) && filled($data['apply_date'])) {
            $start_date = explode("#",$data['apply_date'])[0];
            $end_date = explode("#",$data['apply_date'])[1];
            $params['apply_date']['start_date'] = $start_date;
            $params['apply_date']['end_date'] = $end_date;
        }
        return $this->mapper->getPageList($params);
    }

    /**
     * 新增申请.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function save(array $data): mixed
    {
        $data['user_id'] = user('xcx')->getId();
        $id = $this->mapper->save($data);
        return $id;
    }

    /**
     * 取消申请
     * @param mixed $id
     * @param array $data
     * @return bool
     */
    public function update(mixed $id,array $data) :bool
    {
        $data['user_id'] = user('xcx')->getId();
        $data['apply_status'] = PropertyReleaseApply::DISABLE;
        $id = $this->mapper->update($id,$data);
        return $id;
    }
}
