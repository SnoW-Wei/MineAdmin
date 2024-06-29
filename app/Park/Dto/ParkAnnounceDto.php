<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 公告Dto （导入导出）
 */
#[ExcelData]
class ParkAnnounceDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "公告标题", index: 1)]
    public string $title;

    #[ExcelProperty(value: "公告内容", index: 2)]
    public string $content;

    #[ExcelProperty(value: "发布时间", index: 3)]
    public string $sub_date;

    #[ExcelProperty(value: "公告类型", index: 4)]
    public string $type;

    #[ExcelProperty(value: "排序", index: 5)]
    public string $sort;

    #[ExcelProperty(value: "创建人", index: 6)]
    public string $created_by;

    #[ExcelProperty(value: "更新人", index: 7)]
    public string $updated_by;

    #[ExcelProperty(value: "创建时间", index: 8)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 9)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 10)]
    public string $deleted_at;


}