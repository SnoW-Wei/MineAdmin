<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Request;

use Mine\MineFormRequest;

/**
 * 服务类型验证数据类
 */
class PropertyServiceTypeRequest extends MineFormRequest
{
    /**
     * 公共规则
     */
    public function commonRules(): array
    {
        return [];
    }


    /**
     * 新增数据验证规则
     * return array
     */
    public function saveRules(): array
    {
        return [

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [

        ];
    }


    /**
     * 字段映射名称
     * return array
     */
    public function attributes(): array
    {
        return [
            'id' => '',
            'name' => '名称',
            'parent_id' => '父级',
            'status' => '状态',
            'sort' => '排序',

        ];
    }

}
