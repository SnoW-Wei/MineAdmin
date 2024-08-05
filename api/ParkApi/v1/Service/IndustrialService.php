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

use Api\ParkApi\v1\Mapper\IndustrialMapper;
use Mine\Abstracts\AbstractService;

/**
 * 预订申请服务类
 */
class IndustrialService extends AbstractService
{
    /**
     * @var IndustrialMapper
     */
    public $mapper;

    public function __construct(
        IndustrialMapper $mapper,
    )
    {
        $this->mapper = $mapper;
    }

    /**
     * 获取申请列表.
     * @return array
     */
    public function getApplyList(): array
    {
        $params = [
            'user_id' => user('xcx')->getId(),
            'orderBy' => 'created_at',
            'orderType' => 'desc',
        ];
        return $this->mapper->getPageList($params);
    }

    /**
     * 新增用户.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function save(array $data): mixed
    {
        $data['user_id'] = user('xcx')->getId();
        $id = $this->mapper->save($data);
        return $id;
    }
}
