<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "classifieds".
 *
 * @property int $id
 * @property string $title
 * @property string $avatar
 * @property int $seo_tool_id
 * @property int $serial
 * @property int $category_id
 * @property int $category_classified_id
 * @property string $slug
 * @property string $tags
 * @property string $description
 * @property string $content
 * @property string $acreage
 * @property int $views
 * @property string $price
 * @property int $province_id
 * @property int $district_id
 * @property string $start_date
 * @property string $expiration_date
 * @property int $status
 * @property int $ad_type_id
 * @property int $unit_id
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $address
 * @property string $contacts
 * @property string $contact_name
 * @property string $images
 * @property int $display_homepage
 * @property int $featured
 * @property string $created_at
 *
 * @property AdType $adType
 * @property Category $category
 * @property CategoryClassified $categoryClassified
 * @property District $district
 * @property Province $province
 * @property SeoTool $seoTool
 * @property Unit $unit
 * @property Image[] $images0
 */
class Classified extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classifieds';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'seo_tool_id',
        'category_id',
        'unit_id',
        'province_id',
        'district_id',
        'start_date',
        'expiration_date',
        'acreage',
        'email',
        'phone',
        'mobile',
        'address',
        'contacts',
        'contact_name',
        'category_classified_id',
        'ad_type_id',
        'content',
        'avatar',
        'status',
        'display_homepage',
        'featured'
    ];
}
