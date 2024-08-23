<?php
declare(strict_types=1);
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\PropertyWarmserviceApplyMapper;
use Mine\Abstracts\AbstractService;

/**
 * 温馨服务申请服务类
 */
class PropertyWarmserviceApplyService extends AbstractService
{
    /**
     * @var PropertyWarmserviceApplyMapper
     */
    public $mapper;

    public function __construct(PropertyWarmserviceApplyMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * 申请列表
     * @param array $data
     * @return array
     */
    public function getApplyList(array $data): array
    {
        $params = [
            'orderBy' => 'created_at',
            'orderType' => 'desc',
        ];
        return $this->mapper->getPageList($params);
    }

    /**
     * 新增
     * @param array $data
     * @return mixed
     */
    public function save(array $data): mixed
    {
        $data['user_id'] = user('xcx')->getId();
        return $this->mapper->save($data);
    }
}
