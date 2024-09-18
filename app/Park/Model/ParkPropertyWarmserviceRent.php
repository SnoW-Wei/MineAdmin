<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id 
 * @property string $title 标题
 * @property string $image 图片
 * @property string $address 地址
 * @property int $num 数量
 * @property int $limit 限租数量 0是不限
 * @property string $fee 租金费用 0 不需要租金
 * @property string $content 租借说明
 * @property string $rent_time 时间描述
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 */
class ParkPropertyWarmserviceRent extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_property_warmservice_rent';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'title', 'image', 'address', 'num', 'limit', 'fee', 'content', 'rent_time', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'num' => 'integer', 'limit' => 'integer', 'fee' => 'decimal:2', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
