<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property string $name 名称
 * @property int $parent_id 父级
 * @property int $status 状态 (1正常 2停用)
 * @property int $sort 排序
 * @property int $created_by 创建者
 * @property int $updated_by 更新者
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class PropertyServiceType extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_property_service_type';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'name', 'parent_id', 'status', 'sort', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'parent_id' => 'integer', 'status' => 'integer', 'sort' => 'integer', 'created_by' => 'integer', 'updated_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
