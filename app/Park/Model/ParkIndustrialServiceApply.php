<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property int $service_id 产业服务ID
 * @property int $category_id 申请类型
 * @property int $user_id 用户ID
 * @property string $user_name 用户名称
 * @property string $phone 电话
 * @property string $email 电子邮箱
 * @property string $compay 公司
 * @property string $remark 备注
 * @property int $status 审核状态 0 未审核 1 已审核
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 * @property-read null|\App\Park\Model\ParkIndustrialService $service
 */
class ParkIndustrialServiceApply extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_industrial_service_apply';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'service_id', 'category_id', 'user_id', 'user_name', 'phone', 'email', 'compay', 'remark', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'service_id' => 'integer', 'category_id' => 'integer', 'user_id' => 'integer', 'status' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];


    /**
     * 定义 service 关联
     * @return \Hyperf\Database\Model\Relations\hasOne
     */
    public function service() : \Hyperf\Database\Model\Relations\hasOne
    {
        return $this->hasOne(\App\Park\Model\ParkIndustrialService::class, 'id', 'service_id');
    }
}
