<?php
declare(strict_types=1);
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

namespace App\Park\Mapper;

use App\Park\Model\ParkMpUser;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 小程序用户Mapper类
 */
class ParkMpUserMapper extends AbstractMapper
{
    /**
     * @var ParkMpUser
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkMpUser::class;
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        
        // 
        if (isset($params['id']) && filled($params['id'])) {
            $query->where('id', '=', $params['id']);
        }

        // 头像
        if (isset($params['header_image']) && filled($params['header_image'])) {
            $query->where('header_image', '=', $params['header_image']);
        }

        // 昵称
        if (isset($params['nick_name']) && filled($params['nick_name'])) {
            $query->where('nick_name', 'like', '%'.$params['nick_name'].'%');
        }

        // 真实姓名
        if (isset($params['real_name']) && filled($params['real_name'])) {
            $query->where('real_name', 'like', '%'.$params['real_name'].'%');
        }

        // 性别
        if (isset($params['gender']) && filled($params['gender'])) {
            $query->where('gender', '=', $params['gender']);
        }

        // 公司
        if (isset($params['compay_id']) && filled($params['compay_id'])) {
            $query->where('compay_id', '=', $params['compay_id']);
        }

        // 手机号
        if (isset($params['phone']) && filled($params['phone'])) {
            $query->where('phone', 'like', '%'.$params['phone'].'%');
        }

        // 邮箱
        if (isset($params['email']) && filled($params['email'])) {
            $query->where('email', 'like', '%'.$params['email'].'%');
        }

        // 密码
        if (isset($params['password']) && filled($params['password'])) {
            $query->where('password', 'like', '%'.$params['password'].'%');
        }

        // 公众号OpenID
        if (isset($params['mp_open_id']) && filled($params['mp_open_id'])) {
            $query->where('mp_open_id', 'like', '%'.$params['mp_open_id'].'%');
        }

        // 小程序OpenID
        if (isset($params['xcx_open_id']) && filled($params['xcx_open_id'])) {
            $query->where('xcx_open_id', 'like', '%'.$params['xcx_open_id'].'%');
        }

        // 公众号和小程序联合ID
        if (isset($params['union_open_id']) && filled($params['union_open_id'])) {
            $query->where('union_open_id', 'like', '%'.$params['union_open_id'].'%');
        }

        // 创建时间
        if (isset($params['created_at']) && filled($params['created_at']) && is_array($params['created_at']) && count($params['created_at']) == 2) {
            $query->whereBetween(
                'created_at',
                [ $params['created_at'][0], $params['created_at'][1] ]
            );
        }

        // 更新时间
        if (isset($params['updated_at']) && filled($params['updated_at']) && is_array($params['updated_at']) && count($params['updated_at']) == 2) {
            $query->whereBetween(
                'updated_at',
                [ $params['updated_at'][0], $params['updated_at'][1] ]
            );
        }

        // 删除时间
        if (isset($params['deleted_at']) && filled($params['deleted_at']) && is_array($params['deleted_at']) && count($params['deleted_at']) == 2) {
            $query->whereBetween(
                'deleted_at',
                [ $params['deleted_at'][0], $params['deleted_at'][1] ]
            );
        }

        return $query;
    }
}