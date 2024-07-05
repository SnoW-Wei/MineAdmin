<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 预订申请Dto （导入导出）
 */
#[ExcelData]
class ParkMeetingRoomApplyDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "支付单号", index: 1)]
    public string $pay_order;

    #[ExcelProperty(value: "支付时间", index: 2)]
    public string $pay_time;

    #[ExcelProperty(value: "支付状态", index: 3)]
    public string $pay_status;

    #[ExcelProperty(value: "申请帐号", index: 4)]
    public string $user_id;

    #[ExcelProperty(value: "申请人姓名", index: 5)]
    public string $apply_name;

    #[ExcelProperty(value: "申请人电话", index: 6)]
    public string $apply_phone;

    #[ExcelProperty(value: "申请时段", index: 7)]
    public string $apply_time_period;

    #[ExcelProperty(value: "会议室编号", index: 8)]
    public string $room_id;

    #[ExcelProperty(value: "支付类型", index: 9)]
    public string $pay_type;

    #[ExcelProperty(value: "审核状态", index: 10)]
    public string $status;

    #[ExcelProperty(value: "企业支付截图", index: 11)]
    public string $image;

    #[ExcelProperty(value: "基础服务套餐", index: 12)]
    public string $base_option;

    #[ExcelProperty(value: "铂金服务套餐", index: 13)]
    public string $platinum_option;

    #[ExcelProperty(value: "创建时间", index: 14)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 15)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 16)]
    public string $deleted_at;


}