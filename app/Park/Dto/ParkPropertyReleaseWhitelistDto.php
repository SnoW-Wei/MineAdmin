<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 物品放行手机白名单Dto （导入导出）
 */
#[ExcelData]
class ParkPropertyReleaseWhitelistDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "手机号", index: 1)]
    public string $phone;

    #[ExcelProperty(value: "创建者", index: 2)]
    public string $created_by;

    #[ExcelProperty(value: "创建时间", index: 3)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 4)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 5)]
    public string $deleted_at;


}