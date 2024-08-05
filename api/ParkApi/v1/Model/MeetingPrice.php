<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property string $name 名称
 * @property string $year_month_start 年月开始
 * @property string $year_month_end 年月结束
 * @property int $time_period 时段 1上午 2下午
 * @property string $origin_price 原价格
 * @property string $discount_price 优惠价格
 * @property string $desc 优惠说明
 * @property int $created_by 创建者
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class MeetingPrice extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_meeting_room_price';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'name', 'year_month_start', 'year_month_end', 'time_period', 'origin_price', 'discount_price', 'desc', 'created_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'time_period' => 'integer', 'origin_price' => 'decimal:2', 'discount_price' => 'decimal:2', 'created_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    protected array $hidden = ['deleted_at','created_at','updated_at','created_by'];

}
