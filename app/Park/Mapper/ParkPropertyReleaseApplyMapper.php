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

use App\Park\Model\ParkPropertyReleaseApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 物品放行Mapper类
 */
class ParkPropertyReleaseApplyMapper extends AbstractMapper
{
    /**
     * @var ParkPropertyReleaseApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkPropertyReleaseApply::class;
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

        // 姓名
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

        // 房间号
        if (isset($params['floor']) && filled($params['floor'])) {
            $query->where('floor', 'like', '%'.$params['floor'].'%');
        }

        // 物品类型
        if (isset($params['goods_type']) && filled($params['goods_type'])) {
            $query->where('goods_type', '=', $params['goods_type']);
        }

        // 物品描述
        if (isset($params['goods_desc']) && filled($params['goods_desc'])) {
            $query->where('goods_desc', 'like', '%'.$params['goods_desc'].'%');
        }

        // 车牌号
        if (isset($params['car_no']) && filled($params['car_no'])) {
            $query->where('car_no', 'like', '%'.$params['car_no'].'%');
        }

        // 生成二维码
        if (isset($params['apply_image']) && filled($params['apply_image'])) {
            $query->where('apply_image', '=', $params['apply_image']);
        }

        // 申请状态
        if (isset($params['apply_status']) && filled($params['apply_status'])) {
            $query->where('apply_status', '=', $params['apply_status']);
        }

        // 申请时间
        if (isset($params['apply_at']) && filled($params['apply_at']) && is_array($params['apply_at']) && count($params['apply_at']) == 2) {
            $query->whereBetween(
                'apply_at',
                [ $params['apply_at'][0], $params['apply_at'][1] ]
            );
        }

        // 审核人
        if (isset($params['audit_user_id']) && filled($params['audit_user_id'])) {
            $query->where('audit_user_id', '=', $params['audit_user_id']);
        }

        // 放行时间
        if (isset($params['release_at']) && filled($params['release_at']) && is_array($params['release_at']) && count($params['release_at']) == 2) {
            $query->whereBetween(
                'release_at',
                [ $params['release_at'][0], $params['release_at'][1] ]
            );
        }

        // 附件
        if (isset($params['file']) && filled($params['file'])) {
            $query->where('file', '=', $params['file']);
        }

        // 
        if (isset($params['created_at']) && filled($params['created_at']) && is_array($params['created_at']) && count($params['created_at']) == 2) {
            $query->whereBetween(
                'created_at',
                [ $params['created_at'][0], $params['created_at'][1] ]
            );
        }

        // 
        if (isset($params['updated_at']) && filled($params['updated_at']) && is_array($params['updated_at']) && count($params['updated_at']) == 2) {
            $query->whereBetween(
                'updated_at',
                [ $params['updated_at'][0], $params['updated_at'][1] ]
            );
        }

        // 
        if (isset($params['deleted_at']) && filled($params['deleted_at']) && is_array($params['deleted_at']) && count($params['deleted_at']) == 2) {
            $query->whereBetween(
                'deleted_at',
                [ $params['deleted_at'][0], $params['deleted_at'][1] ]
            );
        }

        return $query;
    }
}