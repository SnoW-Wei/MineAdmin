<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 园区租赁-温馨服务Dto （导入导出）
 */
#[ExcelData]
class ParkPropertyWarmserviceRentDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "标题", index: 1)]
    public string $title;

    #[ExcelProperty(value: "图片", index: 2)]
    public string $image;

    #[ExcelProperty(value: "地址", index: 3)]
    public string $address;

    #[ExcelProperty(value: "数量", index: 4)]
    public string $num;

    #[ExcelProperty(value: "限租数量", index: 5)]
    public string $limit;

    #[ExcelProperty(value: "租金费用", index: 6)]
    public string $fee;

    #[ExcelProperty(value: "租借说明", index: 7)]
    public string $content;

    #[ExcelProperty(value: "时间描述", index: 8)]
    public string $rent_time;

    #[ExcelProperty(value: "created_at", index: 9)]
    public string $created_at;

    #[ExcelProperty(value: "updated_at", index: 10)]
    public string $updated_at;

    #[ExcelProperty(value: "deleted_at", index: 11)]
    public string $deleted_at;


}