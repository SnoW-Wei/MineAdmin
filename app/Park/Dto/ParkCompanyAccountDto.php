<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 对公账户信息Dto （导入导出）
 */
#[ExcelData]
class ParkCompanyAccountDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "税号", index: 1)]
    public string $tax_no;

    #[ExcelProperty(value: "单位地址", index: 2)]
    public string $address;

    #[ExcelProperty(value: "电话", index: 3)]
    public string $tel;

    #[ExcelProperty(value: "开户银行", index: 4)]
    public string $bank_name;

    #[ExcelProperty(value: "银行账户", index: 5)]
    public string $bank_no;

    #[ExcelProperty(value: "创建时间", index: 6)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 7)]
    public string $updated_at;


}