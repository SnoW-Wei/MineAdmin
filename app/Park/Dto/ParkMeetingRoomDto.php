<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 详情配置Dto （导入导出）
 */
#[ExcelData]
class ParkMeetingRoomDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "标题", index: 1)]
    public string $title;

    #[ExcelProperty(value: "小标题", index: 2)]
    public string $subtitle;

    #[ExcelProperty(value: "图片", index: 3)]
    public string $images;

    #[ExcelProperty(value: "联系电话", index: 4)]
    public string $tel;

    #[ExcelProperty(value: "基础费用", index: 5)]
    public string $time_period;

    #[ExcelProperty(value: "基础套餐", index: 6)]
    public string $base_config;

    #[ExcelProperty(value: "铂金套餐", index: 7)]
    public string $platinum_config;

    #[ExcelProperty(value: "详细信息", index: 8)]
    public string $detail;

    #[ExcelProperty(value: "创建者", index: 9)]
    public string $created_by;

    #[ExcelProperty(value: "更新者", index: 10)]
    public string $updated_by;

    #[ExcelProperty(value: "创建时间", index: 11)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 12)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 13)]
    public string $deleted_at;


}