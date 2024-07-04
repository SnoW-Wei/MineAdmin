<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 服务内容Dto （导入导出）
 */
#[ExcelData]
class ParkIndustrialServiceDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "分类类型", index: 1)]
    public string $category_id;

    #[ExcelProperty(value: "标题", index: 2)]
    public string $title;

    #[ExcelProperty(value: "小标题", index: 3)]
    public string $subtitle;

    #[ExcelProperty(value: "公司名称", index: 4)]
    public string $company;

    #[ExcelProperty(value: "列表小图", index: 5)]
    public string $image;

    #[ExcelProperty(value: "公司介绍", index: 6)]
    public string $content;

    #[ExcelProperty(value: "排序", index: 7)]
    public string $sort;

    #[ExcelProperty(value: "创建者", index: 8)]
    public string $created_by;

    #[ExcelProperty(value: "创建时间", index: 9)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 10)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 11)]
    public string $deleted_at;


}