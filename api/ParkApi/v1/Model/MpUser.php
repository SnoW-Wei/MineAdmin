<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

class MpUser extends MineModel
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

    /**
     * 密码加密.
     * @param mixed $value
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }

    /**
     * 验证密码
     * @param mixed $password
     * @param mixed $hash
     */
    public static function passwordVerify($password, $hash): bool
    {
        return password_verify($password, $hash);
    }
}
