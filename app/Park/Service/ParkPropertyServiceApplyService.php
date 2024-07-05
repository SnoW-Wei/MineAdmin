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

use App\Park\Mapper\ParkPropertyServiceApplyMapper;
use Mine\Abstracts\AbstractService;

/**
 * 服务申请服务类
 */
class ParkPropertyServiceApplyService extends AbstractService
{
    /**
     * @var ParkPropertyServiceApplyMapper
     */
    public $mapper;

    public function __construct(ParkPropertyServiceApplyMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}