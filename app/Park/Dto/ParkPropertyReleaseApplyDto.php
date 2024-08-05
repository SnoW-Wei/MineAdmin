<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 物品放行Dto （导入导出）
 */
#[ExcelData]
class ParkPropertyReleaseApplyDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "用户ID", index: 1)]
    public string $user_id;

    #[ExcelProperty(value: "姓名", index: 2)]
    public string $user_name;

    #[ExcelProperty(value: "联系电话", index: 3)]
    public string $phone;

    #[ExcelProperty(value: "公司名称", index: 4)]
    public string $company;

    #[ExcelProperty(value: "房间号", index: 5)]
    public string $floor;

    #[ExcelProperty(value: "物品类型", index: 6)]
    public string $goods_type;

    #[ExcelProperty(value: "物品描述", index: 7)]
    public string $goods_desc;

    #[ExcelProperty(value: "生成二维码", index: 8)]
    public string $apply_image;

    #[ExcelProperty(value: "申请状态", index: 9)]
    public string $apply_status;

    #[ExcelProperty(value: "申请日期", index: 10)]
    public string $apply_date;

    #[ExcelProperty(value: "开始时间", index: 11)]
    public string $apply_start_at;

    #[ExcelProperty(value: "结束时间", index: 12)]
    public string $apply_end_at;

    #[ExcelProperty(value: "审核人", index: 13)]
    public string $audit_user_id;

    #[ExcelProperty(value: "放行时间", index: 14)]
    public string $release_at;

    #[ExcelProperty(value: "附件", index: 15)]
    public string $file;

    #[ExcelProperty(value: "created_at", index: 16)]
    public string $created_at;

    #[ExcelProperty(value: "updated_at", index: 17)]
    public string $updated_at;

    #[ExcelProperty(value: "deleted_at", index: 18)]
    public string $deleted_at;


}