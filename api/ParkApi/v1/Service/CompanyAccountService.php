<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\CompanyAccountMapper;
use Mine\Abstracts\AbstractService;
use Mine\MineModel;

/**
 * 对公账户信息服务类
 */
class CompanyAccountService extends AbstractService
{
    /**
     * @var CompanyAccountMapper
     */
    public $mapper;

    public function __construct(CompanyAccountMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function readOne(): array
    {
        $arr = [
            'created_at' => 'desc',
        ];
        return $this->mapper->readOne($arr)->toArray();
    }
}
