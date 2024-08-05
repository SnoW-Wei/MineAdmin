<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;
use Hyperf\Database\Model\Relations\HasOne;
/**
 * @property int $id
 * @property string $pay_order 支付单号
 * @property string $pay_time 支付时间
 * @property int $pay_status 支付状态 0待支付 1 已支付
 * @property int $user_id 申请帐号
 * @property string $apply_name 申请人姓名
 * @property string $apply_phone 申请人电话
 * @property int $apply_time_period 申请时段
 * @property int $room_id 会议室编号
 * @property int $pay_type 支付类型 1 微信支付 2 企业支付
 * @property int $status 审核状态
 * @property string $image 企业支付截图
 * @property int $base_option 基础服务套餐
 * @property array $platinum_option 铂金服务套餐
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 * @property-read null|\App\Park\Model\ParkMeetingRoom $meeting_room
 */
class MeetingApply extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_meeting_room_apply';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'pay_order', 'wechat_pay_order', 'pay_time', 'pay_status', 'user_id', 'pay_price', 'apply_name', 'apply_company', 'apply_phone', 'apply_date','apply_time_period', 'room_id', 'pay_type', 'status', 'image', 'apply_type', 'platinum_option', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'pay_status' => 'integer', 'user_id' => 'integer', 'pay_price' => 'decimal:2','apply_date' => 'date', 'apply_time_period' => 'integer', 'room_id' => 'integer', 'pay_type' => 'integer', 'status' => 'integer', 'apply_type' => 'integer', 'platinum_option' => 'array', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    protected array $hidden = ['deleted_at','created_at','updated_at'];

    /**
     * 定义 meeting_room 关联
     * @return HasOne
     */
    public function meeting_room() : HasOne
    {
        return $this->hasOne(Meeting::class, 'id', 'room_id');
    }
}
