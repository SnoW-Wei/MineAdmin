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

use App\Park\Model\ParkCompanyAccount;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 对公账户信息Mapper类
 */
class ParkCompanyAccountMapper extends AbstractMapper
{
    /**
     * @var ParkCompanyAccount
     */
    public $model;

    public function assignModel()
    {
        $this->model = ParkCompanyAccount::class;
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

        // 税号
        if (isset($params['tax_no']) && filled($params['tax_no'])) {
            $query->where('tax_no', 'like', '%'.$params['tax_no'].'%');
        }

        // 单位地址
        if (isset($params['address']) && filled($params['address'])) {
            $query->where('address', 'like', '%'.$params['address'].'%');
        }

        // 电话
        if (isset($params['tel']) && filled($params['tel'])) {
            $query->where('tel', '=', $params['tel']);
        }

        // 开户银行
        if (isset($params['bank_name']) && filled($params['bank_name'])) {
            $query->where('bank_name', 'like', '%'.$params['bank_name'].'%');
        }

        // 银行账户
        if (isset($params['bank_no']) && filled($params['bank_no'])) {
            $query->where('bank_no', 'like', '%'.$params['bank_no'].'%');
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

        return $query;
    }
}