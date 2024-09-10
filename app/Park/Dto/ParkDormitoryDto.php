<?php
namespace App\Park\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 配套宿舍Dto （导入导出）
 */
#[ExcelData]
class ParkDormitoryDto implements MineModelExcel
{
    #[ExcelProperty(value: "id", index: 0)]
    public string $id;

    #[ExcelProperty(value: "标题", index: 1)]
    public string $title;

    #[ExcelProperty(value: "副标题", index: 2)]
    public string $sub_title;

    #[ExcelProperty(value: "价格描述", index: 3)]
    public string $price;

    #[ExcelProperty(value: "面积", index: 4)]
    public string $area;

    #[ExcelProperty(value: "标签", index: 5)]
    public string $tags;

    #[ExcelProperty(value: "封面图", index: 6)]
    public string $cover_image;

    #[ExcelProperty(value: "轮播图", index: 7)]
    public string $banner_images;

    #[ExcelProperty(value: "开发商", index: 8)]
    public string $real_estate;

    #[ExcelProperty(value: "物业类型", index: 9)]
    public string $protory_type;

    #[ExcelProperty(value: "楼层信息", index: 10)]
    public string $floor;

    #[ExcelProperty(value: "楼层户型图片", index: 11)]
    public string $floor_plan_images;

    #[ExcelProperty(value: "项目配置", index: 12)]
    public string $project_config;

    #[ExcelProperty(value: "项目概括", index: 13)]
    public string $project_detail;

    #[ExcelProperty(value: "交通图片", index: 14)]
    public string $traffic_image;

    #[ExcelProperty(value: "交通", index: 15)]
    public string $traffic;

    #[ExcelProperty(value: "商业", index: 16)]
    public string $business;

    #[ExcelProperty(value: "周边", index: 17)]
    public string $periphery;

    #[ExcelProperty(value: "医疗", index: 18)]
    public string $medical;

    #[ExcelProperty(value: "教育", index: 19)]
    public string $education;

    #[ExcelProperty(value: "联系电话", index: 20)]
    public string $contact_tel;

    #[ExcelProperty(value: "创建时间", index: 21)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 22)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 23)]
    public string $deleted_at;


}