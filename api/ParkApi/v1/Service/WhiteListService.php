<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\WhiteListMapper;
use Mine\Abstracts\AbstractService;
use Mine\MineModel;

/**
 * 物品放行手机白名单服务类
 */
class WhiteListService extends AbstractService
{
    /**
     * @var WhiteListMapper
     */
    public $mapper;

    public function __construct(WhiteListMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * 详情
     * @param mixed $id
     * @param array $column
     * @return MineModel|null
     */
    public function getDetail(array $bindings, array $column = ['*']) : bool
    {
        if( isset($bindings['phone']) && filled($bindings['phone'])) {
            $r = $this->mapper->getModel()->where(array_keys($bindings)[0], '=', array_values($bindings)[0])->first(['id']);
        }
        $ret = $r?true:false;
        return $ret;
    }
}
