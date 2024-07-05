<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 会议室基本费用Dto （导入导出）
 */
#[ExcelData]
class ParkMeetingRoomPriceDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "名称", index: 1)]
    public string $name;

    #[ExcelProperty(value: "年月开始", index: 2)]
    public string $year_month_start;

    #[ExcelProperty(value: "年月结束", index: 3)]
    public string $year_month_end;

    #[ExcelProperty(value: "时段", index: 4)]
    public string $time_period;

    #[ExcelProperty(value: "原价格", index: 5)]
    public string $origin_price;

    #[ExcelProperty(value: "优惠价格", index: 6)]
    public string $discount_price;

    #[ExcelProperty(value: "优惠说明", index: 7)]
    public string $desc;

    #[ExcelProperty(value: "创建者", index: 8)]
    public string $created_by;

    #[ExcelProperty(value: "创建时间", index: 9)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 10)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 11)]
    public string $deleted_at;


}