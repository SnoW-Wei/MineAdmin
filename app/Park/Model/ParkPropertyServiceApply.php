<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property int $user_id 用户ID
 * @property string $user_name 用户名称
 * @property string $phone 联系电话
 * @property string $company 公司名称
 * @property string $floor 公司详情
 * @property int $level 报修级别 1 普通报修 2 紧急报修
 * @property string $content 描述内容
 * @property int $type_id 服务类型
 * @property string $apply_date 申请时间
 * @property string $apply_status 申请状态
 * @property string $apply_image 图片
 * @property int $audit_user_id 审核人
 * @property string $audit_at 审核时间
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class ParkPropertyServiceApply extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_property_service_apply';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'user_id', 'user_name', 'phone', 'company', 'floor', 'level', 'content', 'type_id', 'apply_date', 'apply_status', 'apply_image','accept_name','accept_phone', 'audit_user_id', 'audit_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'user_id' => 'integer', 'level' => 'integer', 'type_id' => 'integer', 'audit_user_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
