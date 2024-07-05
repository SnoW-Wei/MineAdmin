<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id 
 * @property int $user_id 用户ID
 * @property string $user_name 姓名
 * @property string $phone 联系电话
 * @property string $company 公司名称
 * @property string $floor 房间号
 * @property int $goods_type 物品类型
 * @property string $goods_desc 物品描述
 * @property string $car_no 车牌号
 * @property string $apply_image 生成二维码
 * @property int $apply_status 申请状态
 * @property string $apply_at 申请时间
 * @property int $audit_user_id 审核人
 * @property string $release_at 放行时间
 * @property string $file 附件
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 */
class ParkPropertyReleaseApply extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_property_release_apply';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'user_id', 'user_name', 'phone', 'company', 'floor', 'goods_type', 'goods_desc', 'car_no', 'apply_image', 'apply_status', 'apply_at', 'audit_user_id', 'release_at', 'file', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'user_id' => 'integer', 'goods_type' => 'integer', 'apply_status' => 'integer', 'audit_user_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
