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

use App\Park\Model\ParkNewsArticle;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 产业新闻Mapper类
 */
class ParkNewsArticleMapper extends AbstractMapper
{
    /**
     * @var ParkNewsArticle
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkNewsArticle::class;
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

        // 新闻内容
        if (isset($params['content']) && filled($params['content'])) {
            $query->where('content', '=', $params['content']);
        }

        // 发布时间
        if (isset($params['public_at']) && filled($params['public_at']) && is_array($params['public_at']) && count($params['public_at']) == 2) {
            $query->whereBetween(
                'public_at',
                [ $params['public_at'][0], $params['public_at'][1] ]
            );
        }

        // 排序
        if (isset($params['sort']) && filled($params['sort'])) {
            $query->where('sort', '=', $params['sort']);
        }

        // 新闻图片
        if (isset($params['images']) && filled($params['images'])) {
            $query->where('images', '=', $params['images']);
        }

        // 创建者
        if (isset($params['created_by']) && filled($params['created_by'])) {
            $query->where('created_by', '=', $params['created_by']);
        }

        // 更新者
        if (isset($params['update_by']) && filled($params['update_by'])) {
            $query->where('update_by', '=', $params['update_by']);
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