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
use Carbon\Carbon;
use Mine\Abstracts\AbstractService;
use Mine\Exception\MineException;

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
        if (!isset($data['user_name'])) {
            $data['user_name'] = user('xcx')->getJwt()->getParserData()['nick_name']??'';
        }

        if (!isset($data['user_phone'])) {
            $data['user_phone'] = user('xcx')->getJwt()->getParserData()['phone'];
        }
        $data['apply_date'] = Carbon::now()->format('Y-m-d');

        if($data['service_type'] == 1) {
            $ret = $this->mapper->getOne($data);
            // 每天申请一次
            if($ret) {
                throw new MineException('今天已经申请过，无法继续申请', 500);
            }
        }

        if($data['service_type'] == 2) {
            // 每人限制租借5把
            $param = ['status'=>['0','1','2']];
            $ret = $this->mapper->counts($param);
            if($ret >= 5 ) {
                throw new MineException('每人限制租借5把，无法继续申请', 500);
            }
        }
        return $this->mapper->save($data);
    }
}
