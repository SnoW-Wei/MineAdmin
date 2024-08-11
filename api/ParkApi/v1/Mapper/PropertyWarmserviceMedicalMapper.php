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

use Api\ParkApi\v1\Model\PropertyWarmserviceMedical;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 医疗箱-温馨服务Mapper类
 */
class PropertyWarmserviceMedicalMapper extends AbstractMapper
{
    /**
     * @var PropertyWarmserviceMedical
     */
    public $model;

    public function assignModel()
    {
        $this->model = PropertyWarmserviceMedical::class;
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
