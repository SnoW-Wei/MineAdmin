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

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\PropertyWarmserviceRent;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 园区租赁-温馨服务Mapper类
 */
class PropertyWarmserviceRentMapper extends AbstractMapper
{
    /**
     * @var PropertyWarmserviceRent
     */
    public $model;

    public function assignModel()
    {
        $this->model = PropertyWarmserviceRent::class;
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        return $query;
    }
}
