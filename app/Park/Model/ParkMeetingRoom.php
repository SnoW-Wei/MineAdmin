<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property string $title 标题
 * @property string $subtitle 小标题
 * @property array $images 图片
 * @property string $tel 联系电话
 * @property array $time_period 范围时间费用
 * @property string $detail 详细信息
 * @property int $created_by 创建者
 * @property int $updated_by 更新者
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 * @property-read null|\Mine\MineCollection|\App\Park\Model\ParkMeetingRoomPrice[] $price
 * @property-read null|\App\Park\Model\ParkMeetingRoomPackage $base_config 基础套餐
 * @property-read null|\Mine\MineCollection|\App\Park\Model\ParkMeetingRoomPackage[] $platinum_config 铂金套餐
 */
class ParkMeetingRoom extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_meeting_room';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'title', 'subtitle', 'images', 'tel', 'time_period', 'base_config', 'platinum_config', 'detail', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'images' => 'array', 'time_period' => 'array', 'base_config' => 'integer', 'platinum_config' => 'array', 'created_by' => 'integer', 'updated_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * 定义 price 关联
     * @return \Hyperf\Database\Model\Relations\hasMany
     */
    public function price() : \Hyperf\Database\Model\Relations\hasMany
    {
        return $this->hasMany(\App\Park\Model\ParkMeetingRoomPrice::class, 'id', 'time_period');
    }

    /**
     * 定义 base_config 关联
     * @return \Hyperf\Database\Model\Relations\hasOne
     */
    public function base_config() : \Hyperf\Database\Model\Relations\hasOne
    {
        return $this->hasOne(\App\Park\Model\ParkMeetingRoomPackage::class, 'id', 'base_config');
    }

    /**
     * 定义 platinum_config 关联
     * @return \Hyperf\Database\Model\Relations\hasMany
     */
    public function platinum_config() : \Hyperf\Database\Model\Relations\hasMany
    {
        return $this->hasMany(\App\Park\Model\ParkMeetingRoomPackage::class, 'id', 'platinum_config');
    }
}
