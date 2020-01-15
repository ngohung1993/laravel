<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class ThemeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $themes = [
            ['title' => 'Default', 'avatar' => '/uploads/cms/img/theme-default.png', 'status' => 1]
        ];

        DB::table("themes")->insert($themes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
