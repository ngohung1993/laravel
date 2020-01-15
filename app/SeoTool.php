<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "seo_tool".
 *
 * @property int $id
 * @property string $seo_title
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * @property Category[] $categories
 * @property Post[] $posts
 * @property Product[] $products
 */
class SeoTool extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seo_tools';

    protected $fillable = [
        'seo_title',
        'meta_keywords',
        'meta_description'
    ];
}
