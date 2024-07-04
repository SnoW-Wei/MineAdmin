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

namespace App\Park\Mapper;

use App\Park\Model\ParkIndustrialServiceApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 服务申请Mapper类
 */
class ParkIndustrialServiceApplyMapper extends AbstractMapper
{
    /**
     * @var ParkIndustrialServiceApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkIndustrialServiceApply::class;
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        
        // 
        if (isset($params['id']) && filled($params['id'])) {
            $query->where('id', '=', $params['id']);
        }

        // 产业服务ID
        if (isset($params['service_id']) && filled($params['service_id'])) {
            $query->where('service_id', '=', $params['service_id']);
        }

        // 用户ID
        if (isset($params['user_id']) && filled($params['user_id'])) {
            $query->where('user_id', '=', $params['user_id']);
        }

        // 用户名称
        if (isset($params['user_name']) && filled($params['user_name'])) {
            $query->where('user_name', 'like', '%'.$params['user_name'].'%');
        }

        // 电话
        if (isset($params['phone']) && filled($params['phone'])) {
            $query->where('phone', '=', $params['phone']);
        }

        // 电子邮箱
        if (isset($params['email']) && filled($params['email'])) {
            $query->where('email', 'like', '%'.$params['email'].'%');
        }

        // 公司
        if (isset($params['compay']) && filled($params['compay'])) {
            $query->where('compay', 'like', '%'.$params['compay'].'%');
        }

        // 备注
        if (isset($params['remark']) && filled($params['remark'])) {
            $query->where('remark', '=', $params['remark']);
        }

        // 审核状态
        if (isset($params['status']) && filled($params['status'])) {
            $query->where('status', '=', $params['status']);
        }

        // 创建时间
        if (isset($params['created_at']) && filled($params['created_at']) && is_array($params['created_at']) && count($params['created_at']) == 2) {
            $query->whereBetween(
                'created_at',
                [ $params['created_at'][0], $params['created_at'][1] ]
            );
        }

        // 更新时间
        if (isset($params['updated_at']) && filled($params['updated_at']) && is_array($params['updated_at']) && count($params['updated_at']) == 2) {
            $query->whereBetween(
                'updated_at',
                [ $params['updated_at'][0], $params['updated_at'][1] ]
            );
        }

        // 删除时间
        if (isset($params['deleted_at']) && filled($params['deleted_at']) && is_array($params['deleted_at']) && count($params['deleted_at']) == 2) {
            $query->whereBetween(
                'deleted_at',
                [ $params['deleted_at'][0], $params['deleted_at'][1] ]
            );
        }

        return $query;
    }
}