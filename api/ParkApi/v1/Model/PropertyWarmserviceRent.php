<?php
declare (strict_types=1);

namespace Api\ParkApi\v1\Model;

use Mine\MineModel;

class PropertyWarmserviceRent extends MineModel
{
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    public bool $incrementing = false;

    protected ?string $table = 'park_property_warmservice_rent';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = [
        'id', 'title', 'image', 'address', 'num', 'limit', 'fee', 'content', 'rent_time', 'created_at', 'updated_at', 'deleted_at'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];

    protected array $hidden = ['deleted_at','created_at','updated_at'];

}
