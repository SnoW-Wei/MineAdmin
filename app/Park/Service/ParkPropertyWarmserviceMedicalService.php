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

namespace App\Park\Service;

use App\Park\Mapper\ParkPropertyWarmserviceMedicalMapper;
use Mine\Abstracts\AbstractService;

/**
 * 医疗箱-温馨服务服务类
 */
class ParkPropertyWarmserviceMedicalService extends AbstractService
{
    /**
     * @var ParkPropertyWarmserviceMedicalMapper
     */
    public $mapper;

    public function __construct(ParkPropertyWarmserviceMedicalMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}