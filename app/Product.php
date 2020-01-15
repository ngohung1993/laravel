<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $avatar
 * @property double $price
 * @property int $amount
 * @property int $discount
 * @property int $serial
 * @property string $describe
 * @property string $content
 * @property string $link
 * @property int $status
 * @property int $released
 * @property int $category_id
 * @property int $display_homepage
 * @property int $featured
 * @property int $seo_tool_id
 * @property string $slug
 * @property string $tags
 * @property string $created_at
 * @property int $views
 * @property int $user_id
 * @property string $images
 *
 * @property Attribute[] $attributes0
 * @property Image[] $images0
 * @property OrderDetail[] $orderDetails
 * @property Category $category
 * @property SeoTool $seoTool
 * @property User $user
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'serial',
        'seo_tool_id',
        'category_id',
        'content',
        'price',
        'avatar',
        'link',
        'status',
        'display_homepage',
        'featured'
    ];



    /**
     * Get the images record associated with the product.
     */
    public function image()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Get the category record associated with the product.
     */
    public function category()
    {
        return $this->belongsto('App\Category', 'category_id', 'id');
    }


}
