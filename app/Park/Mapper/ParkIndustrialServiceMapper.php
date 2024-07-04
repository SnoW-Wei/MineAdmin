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

use App\Park\Model\ParkIndustrialService;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 服务内容Mapper类
 */
class ParkIndustrialServiceMapper extends AbstractMapper
{
    /**
     * @var ParkIndustrialService
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkIndustrialService::class;
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

        // 分类类型
        if (isset($params['category_id']) && filled($params['category_id'])) {
            $query->where('category_id', '=', $params['category_id']);
        }

        // 标题
        if (isset($params['title']) && filled($params['title'])) {
            $query->where('title', 'like', '%'.$params['title'].'%');
        }

        // 小标题
        if (isset($params['subtitle']) && filled($params['subtitle'])) {
            $query->where('subtitle', 'like', '%'.$params['subtitle'].'%');
        }

        // 公司名称
        if (isset($params['company']) && filled($params['company'])) {
            $query->where('company', 'like', '%'.$params['company'].'%');
        }

        // 列表小图
        if (isset($params['image']) && filled($params['image'])) {
            $query->where('image', '=', $params['image']);
        }

        // 公司介绍
        if (isset($params['content']) && filled($params['content'])) {
            $query->where('content', '=', $params['content']);
        }

        // 排序
        if (isset($params['sort']) && filled($params['sort'])) {
            $query->where('sort', '=', $params['sort']);
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