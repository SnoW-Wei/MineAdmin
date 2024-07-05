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

use App\Park\Model\ParkMeetingRoom;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 详情配置Mapper类
 */
class ParkMeetingRoomMapper extends AbstractMapper
{
    /**
     * @var ParkMeetingRoom
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkMeetingRoom::class;
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

        // 标题
        if (isset($params['title']) && filled($params['title'])) {
            $query->where('title', 'like', '%'.$params['title'].'%');
        }

        // 小标题
        if (isset($params['subtitle']) && filled($params['subtitle'])) {
            $query->where('subtitle', 'like', '%'.$params['subtitle'].'%');
        }

        // 图片
        if (isset($params['images']) && filled($params['images'])) {
            $query->where('images', '=', $params['images']);
        }

        // 联系电话
        if (isset($params['tel']) && filled($params['tel'])) {
            $query->where('tel', '=', $params['tel']);
        }

        // 基础费用
        if (isset($params['time_period']) && filled($params['time_period'])) {
            $query->where('time_period', '=', $params['time_period']);
        }

        // 基础套餐
        if (isset($params['base_config']) && filled($params['base_config'])) {
            $query->where('base_config', '=', $params['base_config']);
        }

        // 铂金套餐
        if (isset($params['platinum_config']) && filled($params['platinum_config'])) {
            $query->where('platinum_config', '=', $params['platinum_config']);
        }

        // 详细信息
        if (isset($params['detail']) && filled($params['detail'])) {
            $query->where('detail', '=', $params['detail']);
        }

        // 创建者
        if (isset($params['created_by']) && filled($params['created_by'])) {
            $query->where('created_by', '=', $params['created_by']);
        }

        // 更新者
        if (isset($params['updated_by']) && filled($params['updated_by'])) {
            $query->where('updated_by', '=', $params['updated_by']);
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