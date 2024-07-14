<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

class MpUser extends MineModel
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_mp_user';

    /**
     * The attributes that are mass assignable.
     */
    // protected array $fillable = ['id', 'username', 'password', 'user_type', 'nickname', 'phone', 'email', 'avatar', 'signed', 'dashboard', 'status', 'login_ip', 'login_time', 'backend_setting', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at', 'remark'];

    /**
     * The attributes that should be cast to native types.
     */
    // protected array $casts = ['id' => 'integer', 'status' => 'integer', 'created_by' => 'integer', 'updated_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'backend_setting' => 'json'];


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
