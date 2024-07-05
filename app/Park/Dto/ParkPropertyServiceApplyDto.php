<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 服务申请Dto （导入导出）
 */
#[ExcelData]
class ParkPropertyServiceApplyDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "用户ID", index: 1)]
    public string $user_id;

    #[ExcelProperty(value: "用户名称", index: 2)]
    public string $user_name;

    #[ExcelProperty(value: "联系电话", index: 3)]
    public string $phone;

    #[ExcelProperty(value: "公司名称", index: 4)]
    public string $company;

    #[ExcelProperty(value: "公司详情", index: 5)]
    public string $floor;

    #[ExcelProperty(value: "报修级别", index: 6)]
    public string $level;

    #[ExcelProperty(value: "描述内容", index: 7)]
    public string $content;

    #[ExcelProperty(value: "服务类型", index: 8)]
    public string $type_id;

    #[ExcelProperty(value: "申请时间", index: 9)]
    public string $apply_date;

    #[ExcelProperty(value: "申请状态", index: 10)]
    public string $apply_status;

    #[ExcelProperty(value: "图片", index: 11)]
    public string $apply_image;

    #[ExcelProperty(value: "审核人", index: 12)]
    public string $audit_user_id;

    #[ExcelProperty(value: "审核时间", index: 13)]
    public string $audit_at;

    #[ExcelProperty(value: "创建时间", index: 14)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 15)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 16)]
    public string $deleted_at;


}