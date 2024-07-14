<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\MpUser;
use Hyperf\Database\Model\Builder;
use Hyperf\Database\Model\Model;
use Mine\Abstracts\AbstractMapper;
use Mine\Annotation\Transaction;

class MpUserMapper extends AbstractMapper
{
    public $model;

    public function assignModel()
    {
        $this->model = MpUser::class;
    }

    /**
     * 通过小程序OpenId检查用户.
     * @return Builder|Model
     */
    public function checkUserByOpenId(string $xcxopenId)
    {
        return $this->model::query()->where('xcx_open_id', $xcxopenId)->firstOrFail();
    }

    /**
     * 通过用户名检查是否存在.
     */
    public function existsByXcxOpenId(string $xcxopenId): bool
    {
        return $this->model::query()->where('xcx_open_id', $xcxopenId)->exists();
    }

    /**
     * 通过用户名检查是否存在.
     */
    public function existsByUsername(string $username): bool
    {
        return $this->model::query()->where('user_name', $username)->exists();
    }

    /**
     * 通过用户名检查用户.
     * @return Builder|Model
     */
    public function checkUserByUsername(string $username)
    {
        return $this->model::query()->where('user_name', $username)->firstOrFail();
    }

    /**
     * 检查用户密码
     */
    public function checkPass(string $password, string $hash): bool
    {
        return $this->model::passwordVerify($password, $hash);
    }

    /**
     * 初始化用户密码
     */
    public function initUserPassword(int $id, string $password): bool
    {
        $model = $this->model::find($id);
        if ($model) {
            $model->password = $password;
            return $model->save();
        }
        return false;
    }

    /**
     * 根据用户ID列表获取用户基础信息.
     */
    public function getUserInfoByIds(array $ids, ?array $select = null): array
    {
        if (! $select) {
            $select = ['id','header_image','real_name', 'nick_name', 'phone', 'email', 'created_at'];
        }
        return $this->model::query()->whereIn('id', $ids)->select($select)->get()->toArray();
    }

    /**
     * 更新用户.
     */
    #[Transaction]
    public function update(mixed $id, array $data): bool
    {
        $result = parent::update($id, $data);
        if ($result) {
            return true;
        }
        return false;
    }
}
