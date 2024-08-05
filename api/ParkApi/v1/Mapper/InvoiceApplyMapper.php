<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\InvoiceApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;
use Mine\MineModel;

/**
 * 发票申请Mapper类
 */
class InvoiceApplyMapper extends AbstractMapper
{
    /**
     * @var InvoiceApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = InvoiceApply::class;
    }

    public function readOne(mixed $id, array $column = ['*']): array
    {
        $data = $this->model::where('meeting_apply_no',$id)->first()->toArray();
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

        //
        if (isset($params['id']) && filled($params['id'])) {
            $query->where('id', '=', $params['id']);
        }

        // 订单单号
        if (isset($params['meeting_apply_no']) && filled($params['meeting_apply_no'])) {
            $query->where('meeting_apply_no', '=', $params['meeting_apply_no']);
        }

        // 名称
        if (isset($params['name']) && filled($params['name'])) {
            $query->where('name', 'like', '%'.$params['name'].'%');
        }

        // 税号
        if (isset($params['tax_id']) && filled($params['tax_id'])) {
            $query->where('tax_id', 'like', '%'.$params['tax_id'].'%');
        }

        // 地址
        if (isset($params['address']) && filled($params['address'])) {
            $query->where('address', 'like', '%'.$params['address'].'%');
        }

        // 电话号码
        if (isset($params['phone']) && filled($params['phone'])) {
            $query->where('phone', 'like', '%'.$params['phone'].'%');
        }

        // 开户银行
        if (isset($params['bank']) && filled($params['bank'])) {
            $query->where('bank', 'like', '%'.$params['bank'].'%');
        }

        // 银行账户
        if (isset($params['bank_no']) && filled($params['bank_no'])) {
            $query->where('bank_no', 'like', '%'.$params['bank_no'].'%');
        }

        // 创建账号
        if (isset($params['user_id']) && filled($params['user_id'])) {
            $query->where('user_id', '=', $params['user_id']);
        }

        // 发票类型
        if (isset($params['type']) && filled($params['type'])) {
            $query->where('type', '=', $params['type']);
        }

        // 开具状态
        if (isset($params['status']) && filled($params['status'])) {
            $query->where('status', '=', $params['status']);
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

        // 删除时间
        if (isset($params['deleted_at']) && filled($params['deleted_at']) && is_array($params['deleted_at']) && count($params['deleted_at']) == 2) {
            $query->whereBetween(
                'deleted_at',
                [ $params['deleted_at'][0], $params['deleted_at'][1] ]
            );
        }

        return $query;
    }
}
