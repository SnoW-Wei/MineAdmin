<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 温馨服务申请Dto （导入导出）
 */
#[ExcelData]
class ParkPeopertyWarmserviceApplyDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "用户ID", index: 1)]
    public string $user_id;

    #[ExcelProperty(value: "服务", index: 2)]
    public string $service_id;

    #[ExcelProperty(value: "服务类型", index: 3)]
    public string $service_type;

    #[ExcelProperty(value: "申请数量", index: 4)]
    public string $apply_num;

    #[ExcelProperty(value: "申请时间", index: 5)]
    public string $apply_date;

    #[ExcelProperty(value: "支付金额", index: 6)]
    public string $pay_money;

    #[ExcelProperty(value: "微信支付订单", index: 7)]
    public string $pay_wechat_no;

    #[ExcelProperty(value: "状态", index: 8)]
    public string $status;

    #[ExcelProperty(value: "创建时间", index: 9)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 10)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 11)]
    public string $deleted_at;


}