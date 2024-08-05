<?php
declare(strict_types=1);
namespace Api\ParkApi\v1\Mapper;

use Api\ParkApi\v1\Model\MeetingPrice;
use Carbon\Carbon;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;
use Mine\MineModel;

/**
 * 会议室基本费用Mapper类
 */
class MeetingPriceMapper extends AbstractMapper
{
    /**
     * @var MeetingPrice
     */
    public $model;

    public function assignModel()
    {
        $this->model = MeetingPrice::class;
    }

    /**
     * @param array|null $params
     * @param bool $isScope
     * @param string $pageName
     * @return array
     */
    public function getPageList(?array $params, bool $isScope = true, string $pageName = 'page'): array
    {
        $params['date'] = Carbon::parse($params['date'])->format('Y-m');
        $query = $this->handleSearch($this->model::query(),$params);

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
        $curMonth = Carbon::now()->format('Y-m');
        return $this->handleSearch($this->model::query(), ['date'=>$curMonth])->find($id);
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        if (isset($params['date']) && filled($params['date'])) {
            $query->where('year_month_start','<=',$params['date'])
                ->where('year_month_end','>=',$params['date']);
        }
        return $query;
    }
}
