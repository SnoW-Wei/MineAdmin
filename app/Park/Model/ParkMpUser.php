<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property string $header_image 头像
 * @property string $nick_name 昵称
 * @property string $real_name 真实姓名
 * @property int $gender 性别
 * @property string $compay_name 公司
 * @property string $phone 手机号
 * @property string $email 邮箱
 * @property string $password 密码
 * @property string $mp_open_id 公众号OpenID
 * @property string $xcx_open_id 小程序OpenID
 * @property string $union_open_id 公众号和小程序联合ID
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class ParkMpUser extends MineModel
{
    use SoftDeletes;
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_mp_user';

    /**
     * 隐藏的字段列表.
     * @var string[]
     */
    protected array $hidden = ['password', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'header_image', 'nick_name', 'real_name', 'gender', 'compay_name', 'phone', 'email', 'password', 'mp_open_id', 'xcx_open_id', 'union_open_id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'gender' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
