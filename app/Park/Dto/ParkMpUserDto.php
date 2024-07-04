<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 小程序用户Dto （导入导出）
 */
#[ExcelData]
class ParkMpUserDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "头像", index: 1)]
    public string $header_image;

    #[ExcelProperty(value: "昵称", index: 2)]
    public string $nick_name;

    #[ExcelProperty(value: "真实姓名", index: 3)]
    public string $real_name;

    #[ExcelProperty(value: "性别", index: 4)]
    public string $gender;

    #[ExcelProperty(value: "公司", index: 5)]
    public string $compay_name;

    #[ExcelProperty(value: "手机号", index: 6)]
    public string $phone;

    #[ExcelProperty(value: "邮箱", index: 7)]
    public string $email;

    #[ExcelProperty(value: "密码", index: 8)]
    public string $password;

    #[ExcelProperty(value: "公众号OpenID", index: 9)]
    public string $mp_open_id;

    #[ExcelProperty(value: "小程序OpenID", index: 10)]
    public string $xcx_open_id;

    #[ExcelProperty(value: "公众号和小程序联合ID", index: 11)]
    public string $union_open_id;

    #[ExcelProperty(value: "创建时间", index: 12)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 13)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 14)]
    public string $deleted_at;


}