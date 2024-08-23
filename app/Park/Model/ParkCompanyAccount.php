<?php

declare(strict_types=1);

namespace App\Park\Model;

use Mine\MineModel;

/**
 * @property int $id 
 * @property string $tax_no 税号
 * @property string $address 单位地址
 * @property string $tel 电话
 * @property string $bank_name 开户银行
 * @property string $bank_no 银行账户
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 */
class ParkCompanyAccount extends MineModel
{
    public bool $incrementing = false;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_company_account';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'tax_no', 'address', 'tel', 'bank_name', 'bank_no', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
