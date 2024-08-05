<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\MeetingApply;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;
use Mine\MineModel;

/**
 * 预订申请Mapper类
 */
class MeetingApplyMapper extends AbstractMapper
{
    /**
     * @var MeetingApply
     */
    public $model;

    public function assignModel()
    {
        $this->model = MeetingApply::class;
    }

    /**
     * 列表部，不分页
     * @param array|null $params
     * @param bool $isScope
     * @return array
     */
    public function getList(?array $params = null, bool $isScope = true) : array
    {
        $data = $this->handleSearch($this->model::query(), $params)->get()->toArray();
        return $data;
    }

    /**
     * 列表分野
     * @param array|null $params
     * @param bool $isScope
     * @param string $pageName
     * @return array
     */
    public function getPageList(?array $params, bool $isScope = true, string $pageName = 'page'): array
    {
        $query = $this->handleSearch($this->model::query()->with(['meeting_room' => function($query) {
            $query->select('title', 'id'); // 只取需要的字段
        }]),$params);

        return $this->setPaginate(
            $query->paginate(
                (int) ($params['pageSize'] ?? $this->model::PAGE_SIZE),
                ['*'],
                'page',
                (int) ($params['page'] ?? 1)
            )
        );
    }

    /**
     * 获取详情
     */
    public function read(mixed $id, array $column = ['*']): ?MineModel
    {
        return $this->handleSearch($this->model::query(), [])->find($id);
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        $query->where('user_id',user('xcx')->getId());

        if (isset($params['month']) && filled($params['month'])) {
            $query->where('apply_date', '<=', $params['end_month'])
                ->where('apply_date', '>=', $params['start_month']);
        }

        if (isset($params['day']) && filled($params['day'])) {
            $query->where('apply_date', '=', $params['day']);
        }

        if (isset($params['room_id']) && filled($params['room_id'])) {
            $query->where('room_id', '=', $params['room_id']);
        }

        if (isset($params['apply_type']) && filled($params['apply_type'])) {
            $query->where('apply_type', '=', $params['apply_type']);
        }

        if (isset($params['status']) && filled($params['status'])) {
            $query->where('status', '=', $params['status']);
        }

        return $query;
    }
}
