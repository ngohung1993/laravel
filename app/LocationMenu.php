<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "location_menus".
 *
 * @property int $id
 * @property string $title
 * @property int $menus_id
 * @property string $key
 * @property int $released
 *
 * @property Menu $menus
 */
class LocationMenu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_menus';

    protected $fillable = [
        'title',
        'description',
        'key',
        'status'
    ];
}
