<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property string $avatar
 * @property string $icon
 * @property string $description
 * @property int $serial
 * @property int $parent_id
 * @property string $content
 * @property int $page_id
 * @property int $display_homepage
 * @property int $featured
 * @property int $status
 * @property int $seo_tool_id
 * @property string $slug
 * @property string $link
 * @property string $tags
 * @property string $images
 * @property string $created_at
 *
 * @property Page $page
 * @property SeoTool $seoTool
 * @property Classified[] $classifieds
 * @property Image[] $images0
 * @property Post[] $posts
 * @property Product[] $products
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'seo_tool_id',
        'page_id',
        'parent_id',
        'content',
        'serial',
        'avatar',
        'icon',
        'link',
        'status',
        'display_homepage',
        'featured'
    ];

    /**
     * Get the page record associated with the category.
     */
    public function page()
    {
        return $this->belongsto('App\Page', 'page_id', 'id');
    }
}
