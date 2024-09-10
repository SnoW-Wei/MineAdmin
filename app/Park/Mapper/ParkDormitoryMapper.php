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

use App\Park\Model\ParkDormitory;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 配套宿舍Mapper类
 */
class ParkDormitoryMapper extends AbstractMapper
{
    /**
     * @var ParkDormitory
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkDormitory::class;
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

        // 副标题
        if (isset($params['sub_title']) && filled($params['sub_title'])) {
            $query->where('sub_title', 'like', '%'.$params['sub_title'].'%');
        }

        // 价格描述
        if (isset($params['price']) && filled($params['price'])) {
            $query->where('price', 'like', '%'.$params['price'].'%');
        }

        // 面积
        if (isset($params['area']) && filled($params['area'])) {
            $query->where('area', '=', $params['area']);
        }

        // 标签
        if (isset($params['tags']) && filled($params['tags'])) {
            $query->where('tags', '=', $params['tags']);
        }

        // 封面图
        if (isset($params['cover_image']) && filled($params['cover_image'])) {
            $query->where('cover_image', '=', $params['cover_image']);
        }

        // 轮播图
        if (isset($params['banner_images']) && filled($params['banner_images'])) {
            $query->where('banner_images', '=', $params['banner_images']);
        }

        // 开发商
        if (isset($params['real_estate']) && filled($params['real_estate'])) {
            $query->where('real_estate', 'like', '%'.$params['real_estate'].'%');
        }

        // 物业类型
        if (isset($params['protory_type']) && filled($params['protory_type'])) {
            $query->where('protory_type', 'like', '%'.$params['protory_type'].'%');
        }

        // 楼层信息
        if (isset($params['floor']) && filled($params['floor'])) {
            $query->where('floor', 'like', '%'.$params['floor'].'%');
        }

        // 楼层户型图片
        if (isset($params['floor_plan_images']) && filled($params['floor_plan_images'])) {
            $query->where('floor_plan_images', '=', $params['floor_plan_images']);
        }

        // 项目配置
        if (isset($params['project_config']) && filled($params['project_config'])) {
            $query->where('project_config', '=', $params['project_config']);
        }

        // 项目概括
        if (isset($params['project_detail']) && filled($params['project_detail'])) {
            $query->where('project_detail', '=', $params['project_detail']);
        }

        // 交通图片
        if (isset($params['traffic_image']) && filled($params['traffic_image'])) {
            $query->where('traffic_image', '=', $params['traffic_image']);
        }

        // 交通
        if (isset($params['traffic']) && filled($params['traffic'])) {
            $query->where('traffic', '=', $params['traffic']);
        }

        // 商业
        if (isset($params['business']) && filled($params['business'])) {
            $query->where('business', '=', $params['business']);
        }

        // 周边
        if (isset($params['periphery']) && filled($params['periphery'])) {
            $query->where('periphery', '=', $params['periphery']);
        }

        // 医疗
        if (isset($params['medical']) && filled($params['medical'])) {
            $query->where('medical', '=', $params['medical']);
        }

        // 教育
        if (isset($params['education']) && filled($params['education'])) {
            $query->where('education', '=', $params['education']);
        }

        // 联系电话
        if (isset($params['contact_tel']) && filled($params['contact_tel'])) {
            $query->where('contact_tel', '=', $params['contact_tel']);
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