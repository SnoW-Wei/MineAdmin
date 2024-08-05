<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Model;

use Hyperf\Database\Model\SoftDeletes;
use Hyperf\Database\Model\Relations\HasMany;
use Hyperf\Database\Model\Relations\HasOne;
use Mine\MineModel;
class Meeting extends MineModel
{
    use SoftDeletes;

    protected ?string $table = 'park_meeting_room';

    protected array $fillable = ['id', 'title', 'subtitle', 'images', 'tel', 'time_period', 'base_config', 'platinum_config', 'detail', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

    protected array $casts = ['id' => 'integer', 'images' => 'array', 'time_period' => 'array', 'base_config' => 'integer', 'platinum_config' => 'array', 'created_by' => 'integer', 'updated_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    protected array $hidden = ['deleted_at','created_at','updated_at','created_by','updated_by','base_config'];
    /**
     * 定义 price 关联
     * @return HasMany
     */
    public function prices() : HasMany
    {
        return $this->hasMany(MeetingPrice::class, 'id', 'time_period');
    }

    /**
     * 定义 base_config 关联
     * @return hasOne
     */
    public function baseConfig() : hasOne
    {
        return $this->hasOne(MeetingPackage::class, 'id', 'base_config');
    }

    /**
     * 定义 platinum_config 关联
     * @return hasMany
     */
    public function platinumConfigs() : hasMany
    {
        return $this->hasMany(MeetingPackage::class, 'id', 'platinum_config');
    }
}
