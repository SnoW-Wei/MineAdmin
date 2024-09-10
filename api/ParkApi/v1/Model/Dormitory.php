<?php
declare (strict_types=1);

namespace Api\ParkApi\v1\Model;

use Mine\MineModel;

class Dormitory extends MineModel
{
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected ?string $table = 'park_dormitory';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = [
        'id', 'title', 'sub_title', 'price', 'area', 'tags', 'cover_image', 'banner_images', 'real_estate', 'protory_type', 'floor', 'floor_plan_images', 'project_config', 'project_detail', 'traffic_image', 'traffic', 'business', 'periphery', 'medical', 'education', 'contact_tel', 'created_at', 'updated_at', 'deleted_at'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = ['tags' => 'array','banner_images' => 'array','floor_plan_images'=>'array'];


}
