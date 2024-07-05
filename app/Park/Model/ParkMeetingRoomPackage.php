<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id 
 * @property string $title 标题
 * @property int $type 类型 1基础服务 2 铂金服务
 * @property array $fee 费用 费用为空，显示“价格待定，下单后咨询”
 * @property array $option 选项
 * @property string $content 内容
 * @property int $created_by 创建者
 * @property string $created_at 创建时间
 * @property string $update_at 更新时间
 * @property string $deleted_at 删除时间
 */
class ParkMeetingRoomPackage extends MineModel
{
    use SoftDeletes;
    public bool $timestamps = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_meeting_room_package';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'title', 'type', 'fee', 'option', 'content', 'created_by', 'created_at', 'update_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'type' => 'integer', 'fee' => 'array', 'option' => 'array', 'created_by' => 'integer'];
}
