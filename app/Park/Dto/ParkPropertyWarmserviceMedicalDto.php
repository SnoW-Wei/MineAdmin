<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 医疗箱-温馨服务Dto （导入导出）
 */
#[ExcelData]
class ParkPropertyWarmserviceMedicalDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "标题", index: 1)]
    public string $title;

    #[ExcelProperty(value: "数量", index: 2)]
    public string $num;

    #[ExcelProperty(value: "地址", index: 3)]
    public string $address;

    #[ExcelProperty(value: "图片", index: 4)]
    public string $image;

    #[ExcelProperty(value: "说明", index: 5)]
    public string $content;

    #[ExcelProperty(value: "医疗资源", index: 6)]
    public string $category;

    #[ExcelProperty(value: "创建时间", index: 7)]
    public string $created_at;

    #[ExcelProperty(value: "修改时间", index: 8)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 9)]
    public string $deleted_at;


}