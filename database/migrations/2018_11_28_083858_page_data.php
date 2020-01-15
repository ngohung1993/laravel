<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class PageData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $utilities = [
            ['title' => 'Trang đơn', 'released' => 1, 'key' => 'single-page'],
            ['title' => 'Trang rỗng', 'released' => 1, 'key' => 'empty-page'],
            ['title' => 'Trang liên hệ', 'released' => 1, 'key' => 'contact-page'],
            ['title' => 'Trang bản tin', 'released' => 1, 'key' => 'news-page'],
            ['title' => 'Trang sản phẩm', 'released' => 1, 'key' => 'product-page'],
            ['title' => 'Trang dự án', 'released' => 1, 'key' => 'project-page'],
            ['title' => 'Trang tin rao', 'released' => 1, 'key' => 'classified-page']
        ];

        DB::table("pages")->insert($utilities);
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
