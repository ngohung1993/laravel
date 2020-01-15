<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property int $serial
 * @property string $avatar
 * @property string $description
 * @property string $content
 * @property string $tags
 * @property int $display_homepage
 * @property int $status
 * @property int $featured
 * @property int $seo_tool_id
 * @property string $slug
 * @property string $created_at
 * @property int $views
 * @property string $images
 * @property int $user_id
 *
 * @property Image[] $images0
 * @property Category $category
 * @property SeoTool $seoTool
 * @property User $user
 */
class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'seo_tool_id',
        'category_id',
        'content',
        'avatar',
        'status',
        'display_homepage',
        'featured'
    ];

    /**
     * Get the category record associated with the post.
     */
    public function category()
    {
        return $this->belongsto('App\Category', 'category_id', 'id');
    }

    /**
     * Get the seo_tool record associated with the post.
     */
    public function setTool()
    {
        return $this->belongsto('App\seo_tools', 'seo_tool_id', 'id');
    }
}
