<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 图标网格Dto （导入导出）
 */
#[ExcelData]
class ParkIconGridDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "图标名称", index: 1)]
    public string $title;

    #[ExcelProperty(value: "图标图片", index: 2)]
    public string $icon_image;

    #[ExcelProperty(value: "标识", index: 3)]
    public string $code;

    #[ExcelProperty(value: "跳转地址", index: 4)]
    public string $url;

    #[ExcelProperty(value: "排序", index: 5)]
    public string $sort;

    #[ExcelProperty(value: "创建者", index: 6)]
    public string $created_by;

    #[ExcelProperty(value: "更新者", index: 7)]
    public string $updated_by;

    #[ExcelProperty(value: "创建时间", index: 8)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 9)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 10)]
    public string $deleted_at;


}