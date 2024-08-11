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

use App\Park\Model\ParkPropertyWarmserviceRent;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 园区租赁-温馨服务Mapper类
 */
class ParkPropertyWarmserviceRentMapper extends AbstractMapper
{
    /**
     * @var ParkPropertyWarmserviceRent
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkPropertyWarmserviceRent::class;
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

        // 图片
        if (isset($params['image']) && filled($params['image'])) {
            $query->where('image', '=', $params['image']);
        }

        // 地址
        if (isset($params['address']) && filled($params['address'])) {
            $query->where('address', 'like', '%'.$params['address'].'%');
        }

        // 数量
        if (isset($params['num']) && filled($params['num'])) {
            $query->where('num', '=', $params['num']);
        }

        // 限租数量
        if (isset($params['limit']) && filled($params['limit'])) {
            $query->where('limit', '=', $params['limit']);
        }

        // 租金费用
        if (isset($params['fee']) && filled($params['fee'])) {
            $query->where('fee', '=', $params['fee']);
        }

        // 租借说明
        if (isset($params['content']) && filled($params['content'])) {
            $query->where('content', '=', $params['content']);
        }

        // 时间描述
        if (isset($params['rent_time']) && filled($params['rent_time'])) {
            $query->where('rent_time', 'like', '%'.$params['rent_time'].'%');
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