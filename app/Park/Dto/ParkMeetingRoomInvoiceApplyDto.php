<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 发票申请Dto （导入导出）
 */
#[ExcelData]
class ParkMeetingRoomInvoiceApplyDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "订单单号", index: 1)]
    public string $meeting_apply_no;

    #[ExcelProperty(value: "名称", index: 2)]
    public string $name;

    #[ExcelProperty(value: "税号", index: 3)]
    public string $tax_id;

    #[ExcelProperty(value: "地址", index: 4)]
    public string $address;

    #[ExcelProperty(value: "电话号码", index: 5)]
    public string $phone;

    #[ExcelProperty(value: "开户银行", index: 6)]
    public string $bank;

    #[ExcelProperty(value: "银行账户", index: 7)]
    public string $bank_no;

    #[ExcelProperty(value: "创建账号", index: 8)]
    public string $user_id;

    #[ExcelProperty(value: "发票类型", index: 9)]
    public string $type;

    #[ExcelProperty(value: "开具状态", index: 10)]
    public string $status;

    #[ExcelProperty(value: "创建时间", index: 11)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 12)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 13)]
    public string $deleted_at;


}