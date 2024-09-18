<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id 
 * @property string $title 标题
 * @property int $num 数量 0 不限总数量
 * @property string $address 地址
 * @property string $image 图片
 * @property string $content 说明
 * @property array $category 医疗资源类别
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 修改时间
 * @property string $deleted_at 删除时间
 */
class ParkPropertyWarmserviceMedical extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_property_warmservice_medical';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'title', 'num', 'address', 'image', 'content', 'category', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'num' => 'integer', 'category' => 'array', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
