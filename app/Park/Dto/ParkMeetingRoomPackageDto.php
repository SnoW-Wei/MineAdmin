<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 套餐配置Dto （导入导出）
 */
#[ExcelData]
class ParkMeetingRoomPackageDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "标题", index: 1)]
    public string $title;

    #[ExcelProperty(value: "类型", index: 2)]
    public string $type;

    #[ExcelProperty(value: "费用", index: 3)]
    public string $fee;

    #[ExcelProperty(value: "选项", index: 4)]
    public string $option;

    #[ExcelProperty(value: "内容", index: 5)]
    public string $content;

    #[ExcelProperty(value: "创建者", index: 6)]
    public string $created_by;

    #[ExcelProperty(value: "创建时间", index: 7)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 8)]
    public string $update_at;

    #[ExcelProperty(value: "删除时间", index: 9)]
    public string $deleted_at;


}