<?php
declare (strict_types=1);

namespace Api\ParkApi\v1\Model;

use Mine\MineModel;

class CompanyAccount extends MineModel
{
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected ?string $table = 'park_company_account';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = [
        'id', 'tax_no', 'address', 'tel', 'bank_name', 'bank_no', 'created_at', 'updated_at'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];

    protected array $hidden = ['created_at', 'updated_at'];

}
