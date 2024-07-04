<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 产业新闻Dto （导入导出）
 */
#[ExcelData]
class ParkNewsArticleDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "标题", index: 1)]
    public string $title;

    #[ExcelProperty(value: "新闻内容", index: 2)]
    public string $content;

    #[ExcelProperty(value: "发布时间", index: 3)]
    public string $public_at;

    #[ExcelProperty(value: "排序", index: 4)]
    public string $sort;

    #[ExcelProperty(value: "新闻图片", index: 5)]
    public string $images;

    #[ExcelProperty(value: "创建者", index: 6)]
    public string $created_by;

    #[ExcelProperty(value: "更新者", index: 7)]
    public string $update_by;

    #[ExcelProperty(value: "创建时间", index: 8)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 9)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 10)]
    public string $deleted_at;


}