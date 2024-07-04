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

use App\Park\Mapper\ParkNewsArticleMapper;
use Mine\Abstracts\AbstractService;

/**
 * 产业新闻服务类
 */
class ParkNewsArticleService extends AbstractService
{
    /**
     * @var ParkNewsArticleMapper
     */
    public $mapper;

    public function __construct(ParkNewsArticleMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}