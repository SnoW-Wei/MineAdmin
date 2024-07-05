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

use App\Park\Model\ParkMeetingRoomPrice;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 会议室基本费用Mapper类
 */
class ParkMeetingRoomPriceMapper extends AbstractMapper
{
    /**
     * @var ParkMeetingRoomPrice
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkMeetingRoomPrice::class;
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

        // 名称
        if (isset($params['name']) && filled($params['name'])) {
            $query->where('name', 'like', '%'.$params['name'].'%');
        }

        // 年月开始
        if (isset($params['year_month_start']) && filled($params['year_month_start'])) {
            $query->where('year_month_start', '=', $params['year_month_start']);
        }

        // 年月结束
        if (isset($params['year_month_end']) && filled($params['year_month_end'])) {
            $query->where('year_month_end', '=', $params['year_month_end']);
        }

        // 时段
        if (isset($params['time_period']) && filled($params['time_period'])) {
            $query->where('time_period', '=', $params['time_period']);
        }

        // 原价格
        if (isset($params['origin_price']) && filled($params['origin_price'])) {
            $query->where('origin_price', '=', $params['origin_price']);
        }

        // 优惠价格
        if (isset($params['discount_price']) && filled($params['discount_price'])) {
            $query->where('discount_price', '=', $params['discount_price']);
        }

        // 优惠说明
        if (isset($params['desc']) && filled($params['desc'])) {
            $query->where('desc', 'like', '%'.$params['desc'].'%');
        }

        // 创建者
        if (isset($params['created_by']) && filled($params['created_by'])) {
            $query->where('created_by', '=', $params['created_by']);
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