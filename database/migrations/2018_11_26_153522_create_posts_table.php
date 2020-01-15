<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
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
            $table->string('slug');
            $table->text('content')->nullable();

            $table->unsignedInteger('seo_tool_id');
            $table->foreign('seo_tool_id')->references('id')->on('seo_tools')->onDelete('cascade');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
