<?php

declare(strict_types=1);

namespace App\Park\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;

/**
 * @property int $id
 * @property string $title 标题
 * @property string $content 新闻内容
 * @property string $public_at 发布时间
 * @property int $sort 排序
 * @property string $images 新闻图片
 * @property int $created_by 创建者
 * @property int $update_by 更新者
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class ParkNewsArticle extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'park_news_article';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'title', 'content', 'public_at', 'sort', 'images', 'created_by', 'update_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'sort' => 'integer','images'=>'array', 'created_by' => 'integer', 'update_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
