<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "custom_fields".
 *
 * @property int $id
 * @property string $title
 * @property int $theme_id
 * @property string $description
 * @property string $images
 * @property string $avatar
 * @property string $content
 * @property string $frame
 * @property string $icon
 * @property int $serial
 * @property int $type
 * @property int $parent_id
 * @property string $key
 * @property int $status
 * @property int $released
 * @property string $placeholder
 * @property string $explain
 * @property string $value
 * @property string $link
 * @property string $alt
 *
 * @property Theme $theme
 */
class CustomField extends Model
{
    const TYPE_SETTING = 1;
    const TYPE_SECTION = 2;
    const TYPE_TEXT = 3;
    const TYPE_AREA = 4;
    const TYPE_SELECT = 5;
    const TYPE_CHECKBOX = 6;
    const TYPE_RADIO = 7;
    const TYPE_IMAGE = 8;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_fields';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'seo_tool_id',
        'page_id',
        'parent_id',
        'content',
        'avatar',
        'icon',
        'link',
        'status',
        'display_homepage',
        'featured'
    ];
}
