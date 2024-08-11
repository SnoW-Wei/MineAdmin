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

namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\PropertyWarmserviceRentMapper;
use Mine\Abstracts\AbstractService;

/**
 * 园区租赁-温馨服务服务类
 */
class PropertyWarmserviceRentService extends AbstractService
{
    /**
     * @var PropertyWarmserviceRentMapper
     */
    public $mapper;

    public function __construct(PropertyWarmserviceRentMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}
