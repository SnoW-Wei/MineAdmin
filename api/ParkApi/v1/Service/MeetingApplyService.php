<?php

declare(strict_types=1);

namespace Api\ParkApi\v1\Service;

use Api\ParkApi\v1\Mapper\MeetingApplyMapper;
use Carbon\Carbon;
use Mine\Abstracts\AbstractService;

/**
 * 预订申请服务类.
 */
class MeetingApplyService extends AbstractService
{
    /**
     * @var MeetingApplyMapper
     */
    public $mapper;

    public function __construct(MeetingApplyMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * 会议室日期申请信息.
     */
    public function getCalendarApplyList($params): array
    {
        $params['apply_type'] = 1;  // 基础服务；
        $params['status'] = 2;  // 支付已审核；

        if (isset($params['day']) && filled($params['day'])) {
            $params['day'] = date('Y-m-d', strtotime($params['day']));
            $data = $this->mapper->getList($params);

            foreach ($data as $item => $value) {
                if (strtotime($params['day']) == strtotime($value['apply_date'])) {
                    $days[$params['day']][] = $value[
                    'apply_time_period'
                    ];
                }
            }
        }

        if (isset($params['month']) && filled($params['month'])) {
            $params['start_month'] = Carbon::parse($params['month'])->startOfMonth()->toDateString();
            $params['end_month'] = Carbon::parse($params['month'])->endOfMonth()->toDateString();
            $data = $this->mapper->getList($params);

            $days = [];
            foreach ($data as $item => $value) {
                $apply_date = date('Y-m-d', strtotime($value['apply_date']));
                if ($value['apply_time_period'] == 3) {
                    // 全天
                    $days[$apply_date] = true;
                }
                if(!isset($days[$apply_date]) || $days[$apply_date] !== true) {
                    $tmp[$apply_date][] = $value[
                    'apply_time_period'
                    ];
                    if(count($tmp[$apply_date]) == 2) {
                        $days[$apply_date] = true;
                    }
                }
            }
        }

        return $days;
    }

    /**
     * 新增申请.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function save(array $data): mixed
    {
        $data['user_id'] = user('xcx')->getId();
        $data['pay_order'] = 'meetapply_' . snowflake_id();
        $data['pay_time'] = Carbon::now()->format('Y-m-d H:i:s');

        return $this->mapper->save($data);
    }
}
