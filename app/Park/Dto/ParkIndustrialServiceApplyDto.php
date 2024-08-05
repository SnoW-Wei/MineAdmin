<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 服务申请Dto （导入导出）
 */
#[ExcelData]
class ParkIndustrialServiceApplyDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "产业服务ID", index: 1)]
    public string $service_id;

    #[ExcelProperty(value: "申请类型", index: 2)]
    public string $category_id;

    #[ExcelProperty(value: "用户ID", index: 3)]
    public string $user_id;

    #[ExcelProperty(value: "用户名称", index: 4)]
    public string $user_name;

    #[ExcelProperty(value: "电话", index: 5)]
    public string $phone;

    #[ExcelProperty(value: "电子邮箱", index: 6)]
    public string $email;

    #[ExcelProperty(value: "公司", index: 7)]
    public string $compay;

    #[ExcelProperty(value: "备注", index: 8)]
    public string $remark;

    #[ExcelProperty(value: "审核状态", index: 9)]
    public string $status;

    #[ExcelProperty(value: "创建时间", index: 10)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 11)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 12)]
    public string $deleted_at;


}