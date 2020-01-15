<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('serial')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('featured')->default(0);
            $table->integer('status')->default(0);

            $table->unsignedInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedInteger('classified_id')->nullable();
            $table->foreign('classified_id')->references('id')->on('classifieds')->onDelete('cascade');

            $table->unsignedInteger('custom_field_id')->nullable();
            $table->foreign('custom_field_id')->references('id')->on('custom_fields')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
