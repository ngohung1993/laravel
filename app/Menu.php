<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "menus".
 *
 * @property int $id
 * @property string $title
 * @property string items
 * @property int $status
 *
 * @property LocationMenu $locatioMenu
 */
class Menu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    protected $fillable = [
        'title',
        'location_menu_id',
        'items',
        'status'
    ];
}
