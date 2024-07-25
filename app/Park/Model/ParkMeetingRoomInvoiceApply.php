<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id 
 * @property int $meeting_apply_no 订单单号
 * @property string $name 名称
 * @property string $tax_id 税号
 * @property string $address 地址
 * @property string $phone 电话号码
 * @property string $bank 开户银行
 * @property string $bank_no 银行账户
 * @property int $user_id 创建账号
 * @property int $type 发票类型 1 会议室
 * @property int $status 开具状态
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class ParkMeetingRoomInvoiceApply extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_meeting_room_invoice_apply';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'meeting_apply_no', 'name', 'tax_id', 'address', 'phone', 'bank', 'bank_no', 'user_id', 'type', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'meeting_apply_no' => 'integer', 'user_id' => 'integer', 'type' => 'integer', 'status' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * 定义 meeting_apply 关联
     * @return \Hyperf\Database\Model\Relations\hasOne
     */
    public function meeting_apply() : \Hyperf\Database\Model\Relations\hasOne
    {
        return $this->hasOne(\App\Park\Model\ParkMeetingRoomApply::class, '', 'meeting_apply_no');
    }
}
