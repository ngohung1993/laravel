<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->string('avatar')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->integer('serial')->default(0);
            $table->boolean('display_homepage')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('parent_id')->nullable();
            $table->string('slug');
            $table->string('link')->nullable();
            $table->text('content')->nullable();
            $table->integer('seo_tool_id');

            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
