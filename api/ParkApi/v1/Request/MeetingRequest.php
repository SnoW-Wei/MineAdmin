<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Request;

use Mine\MineFormRequest;

class MeetingRequest extends MineFormRequest
{

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
     * 字段映射名称
     * return array.
     */
    public function attributes(): array
    {
        return [
        ];
    }
}
