<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;


use Api\ParkApi\v1\Mapper\InvoiceApplyMapper;
use Mine\Abstracts\AbstractService;
use Mine\MineModel;

/**
 * 发票申请服务类
 */
class InvoiceApplyService extends AbstractService
{
    /**
     * @var InvoiceApplyMapper
     */
    public $mapper;

    public function __construct(InvoiceApplyMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function readOne(int $id): array
    {
        return $this->mapper->readOne($id);
    }

    /**
     * 新增申请.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function save(array $data): mixed
    {
        $data['user_id'] = user('xcx')->getId();
        $id = $this->mapper->save($data);
        return $id;
    }
}
