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

use App\Park\Model\ParkMeetingRoomPackage;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 套餐配置Mapper类
 */
class ParkMeetingRoomPackageMapper extends AbstractMapper
{
    /**
     * @var ParkMeetingRoomPackage
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkMeetingRoomPackage::class;
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

        // 类型
        if (isset($params['type']) && filled($params['type'])) {
            $query->where('type', '=', $params['type']);
        }

        // 费用
        if (isset($params['fee']) && filled($params['fee'])) {
            $query->where('fee', '=', $params['fee']);
        }

        // 选项
        if (isset($params['option']) && filled($params['option'])) {
            $query->where('option', '=', $params['option']);
        }

        // 内容
        if (isset($params['content']) && filled($params['content'])) {
            $query->where('content', '=', $params['content']);
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
        if (isset($params['update_at']) && filled($params['update_at']) && is_array($params['update_at']) && count($params['update_at']) == 2) {
            $query->whereBetween(
                'update_at',
                [ $params['update_at'][0], $params['update_at'][1] ]
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