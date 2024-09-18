<?php
declare (strict_types=1);

namespace Api\ParkApi\v1\Model;

use Mine\MineModel;

class PropertyWarmserviceMedical extends MineModel
{
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    public bool $incrementing = false;

    protected ?string $table = 'park_property_warmservice_medical';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = [
        'id', 'title', 'num', 'address', 'image', 'content', 'category', 'created_at', 'updated_at', 'deleted_at'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];

    protected array $hidden = ['deleted_at','created_at','updated_at'];

}
