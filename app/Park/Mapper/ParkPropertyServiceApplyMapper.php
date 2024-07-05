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

use App\Park\Model\ParkPropertyServiceApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 服务申请Mapper类
 */
class ParkPropertyServiceApplyMapper extends AbstractMapper
{
    /**
     * @var ParkPropertyServiceApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkPropertyServiceApply::class;
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

        // 用户ID
        if (isset($params['user_id']) && filled($params['user_id'])) {
            $query->where('user_id', '=', $params['user_id']);
        }

        // 用户名称
        if (isset($params['user_name']) && filled($params['user_name'])) {
            $query->where('user_name', 'like', '%'.$params['user_name'].'%');
        }

        // 联系电话
        if (isset($params['phone']) && filled($params['phone'])) {
            $query->where('phone', '=', $params['phone']);
        }

        // 公司名称
        if (isset($params['company']) && filled($params['company'])) {
            $query->where('company', 'like', '%'.$params['company'].'%');
        }

        // 公司详情
        if (isset($params['floor']) && filled($params['floor'])) {
            $query->where('floor', 'like', '%'.$params['floor'].'%');
        }

        // 报修级别
        if (isset($params['level']) && filled($params['level'])) {
            $query->where('level', '=', $params['level']);
        }

        // 描述内容
        if (isset($params['content']) && filled($params['content'])) {
            $query->where('content', '=', $params['content']);
        }

        // 服务类型
        if (isset($params['type_id']) && filled($params['type_id'])) {
            $query->where('type_id', '=', $params['type_id']);
        }

        // 申请时间
        if (isset($params['apply_date']) && filled($params['apply_date']) && is_array($params['apply_date']) && count($params['apply_date']) == 2) {
            $query->whereBetween(
                'apply_date',
                [ $params['apply_date'][0], $params['apply_date'][1] ]
            );
        }

        // 申请状态
        if (isset($params['apply_status']) && filled($params['apply_status'])) {
            $query->where('apply_status', 'like', '%'.$params['apply_status'].'%');
        }

        // 图片
        if (isset($params['apply_image']) && filled($params['apply_image'])) {
            $query->where('apply_image', '=', $params['apply_image']);
        }

        // 审核人
        if (isset($params['audit_user_id']) && filled($params['audit_user_id'])) {
            $query->where('audit_user_id', '=', $params['audit_user_id']);
        }

        // 审核时间
        if (isset($params['audit_at']) && filled($params['audit_at']) && is_array($params['audit_at']) && count($params['audit_at']) == 2) {
            $query->whereBetween(
                'audit_at',
                [ $params['audit_at'][0], $params['audit_at'][1] ]
            );
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