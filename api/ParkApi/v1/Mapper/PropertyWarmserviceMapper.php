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
use Api\ParkApi\v1\Model\PropertyWarmserviceMedical;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 园区租赁-温馨服务Mapper类
 */
class PropertyWarmserviceMapper extends AbstractMapper
{
    /**
     * @var PropertyWarmserviceRent
     * @var PropertyWarmserviceMedical
     */
    public $rentModel;
    public $medicalModel;

    public function assignModel()
    {
        $this->rentModel = PropertyWarmserviceRent::class;
        $this->medicalModel = PropertyWarmserviceMedical::class;
    }

    /**
     * 列表部，不分页
     * @param array|null $params
     * @param bool $isScope
     * @return array
     */
    public function getList(?array $params = null, bool $isScope = true) : array
    {
        $medicalData = $this->handleSearch($this->medicalModel::query(), $params , $isScope)->get()->toArray();
        $rentData = $this->handleSearch($this->rentModel::query(), $params , $isScope)->get()->toArray();

        $data = array_merge($medicalData,$rentData);
        return $data;
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
