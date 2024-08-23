<?php
declare (strict_types=1);

namespace Api\ParkApi\v1\Model;

use Mine\MineModel;

class PropertyWarmserviceApply extends MineModel
{
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected ?string $table = 'park_peoperty_warmservice_apply';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = [
        'id', 'user_id', 'service_id', 'service_type', 'apply_num', 'apply_date', 'pay_money', 'pay_wechat_no', 'status', 'created_at', 'updated_at', 'deleted_at'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];


    /**
     * 定义 warmservice_user 关联
     * @return \Hyperf\Database\Model\Relations\hasOne
     */
    public function warmservice_user() : \Hyperf\Database\Model\Relations\hasOne
    {
        return $this->hasOne(\App\Park\Model\ParkMpUser::class, 'id', 'user_id');
    }

}
