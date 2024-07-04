<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property int $category_id 分类类型
 * @property string $title 标题
 * @property string $subtitle 小标题
 * @property string $company 公司名称
 * @property string $image 公司列表小图片
 * @property string $content 公司介绍
 * @property int $sort 排序
 * @property int $created_by 创建者
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 * @property-read null|\App\Park\Model\ParkIndustrialServiceCategory $category
 */
class ParkIndustrialService extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_industrial_service';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'category_id', 'title', 'subtitle', 'company', 'image', 'content', 'sort', 'created_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'category_id' => 'integer', 'sort' => 'integer', 'created_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * 定义 category 关联
     * @return \Hyperf\Database\Model\Relations\belongsTo
     */
    public function category() : \Hyperf\Database\Model\Relations\belongsTo
    {
        return $this->belongsTo(\App\Park\Model\ParkIndustrialServiceCategory::class, 'id', 'category_id');
    }
}
