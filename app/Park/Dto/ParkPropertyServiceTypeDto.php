<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 服务类型Dto （导入导出）
 */
#[ExcelData]
class ParkPropertyServiceTypeDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "名称", index: 1)]
    public string $name;

    #[ExcelProperty(value: "父级", index: 2)]
    public string $parent_id;

    #[ExcelProperty(value: "状态", index: 3)]
    public string $status;

    #[ExcelProperty(value: "排序", index: 4)]
    public string $sort;

    #[ExcelProperty(value: "创建者", index: 5)]
    public string $created_by;

    #[ExcelProperty(value: "更新者", index: 6)]
    public string $updated_by;

    #[ExcelProperty(value: "创建时间", index: 7)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 8)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 9)]
    public string $deleted_at;


}