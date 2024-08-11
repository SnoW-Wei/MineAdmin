<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id 
 * @property int $user_id 用户ID
 * @property int $service_id 温馨服务编号
 * @property int $service_type 温馨服务类型 1 园区医疗箱 2雨伞
 * @property int $apply_num 申请数量
 * @property string $apply_date 申请时间
 * @property string $pay_money 支付金额
 * @property string $pay_wechat_no 微信支付订单
 * @property int $status 1 支付成功或申请成功，2 退款成功
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class ParkPeopertyWarmserviceApply extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_peoperty_warmservice_apply';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'user_id', 'service_id', 'service_type', 'apply_num', 'apply_date', 'pay_money', 'pay_wechat_no', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'user_id' => 'integer', 'service_id' => 'integer', 'service_type' => 'integer', 'apply_num' => 'integer', 'pay_money' => 'decimal:2', 'status' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * 定义 warmservice_user 关联
     * @return \Hyperf\Database\Model\Relations\hasOne
     */
    public function warmservice_user() : \Hyperf\Database\Model\Relations\hasOne
    {
        return $this->hasOne(\App\Park\Model\ParkMpUser::class, 'id', 'user_id');
    }
}
