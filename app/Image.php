<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $title
 * @property string $avatar
 * @property int $serial
 * @property string $link
 * @property string $description
 * @property int $featured
 * @property string $content
 * @property int $post_id
 * @property int $category_id
 * @property int $custom_field_id
 * @property int $product_id
 * @property int $classified_id
 * @property int $status
 *
 * @property Category $category
 * @property Classified $classified
 * @property CustomField $customField
 * @property Post $post
 * @property Product $product
 */
class Image extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'avatar',
        'link',
        'status',
        'display_homepage',
        'featured',
        'category_id',
        'post_id',
        'classified_id',
        'product_id',
        'custom_field_id'
    ];
}
