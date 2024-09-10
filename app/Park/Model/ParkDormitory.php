<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property string $title 标题
 * @property string $sub_title 副标题
 * @property string $price 价格描述
 * @property int $area 面积
 * @property array $tags 标签
 * @property string $cover_image 封面图
 * @property string $banner_images 轮播图
 * @property string $real_estate 开发商
 * @property string $protory_type 物业类型
 * @property string $floor 楼层信息
 * @property string $floor_plan_images 楼层户型图片
 * @property string $project_config 项目配置
 * @property string $project_detail 项目概括
 * @property string $traffic_image 交通图片
 * @property string $traffic 交通
 * @property string $business 商业
 * @property string $periphery 周边
 * @property string $medical 医疗
 * @property string $education 教育
 * @property string $contact_tel 联系电话
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class ParkDormitory extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_dormitory';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'title', 'sub_title', 'price', 'area', 'tags', 'cover_image', 'banner_images', 'real_estate', 'protory_type', 'floor', 'floor_plan_images', 'project_config', 'project_detail', 'traffic_image', 'traffic', 'business', 'periphery', 'medical', 'education', 'contact_tel', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'area' => 'integer', 'banner_images' => 'array','floor_plan_images'=>'array', 'tags' => 'array', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
