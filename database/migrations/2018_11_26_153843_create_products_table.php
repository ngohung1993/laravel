<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->double('price')->nullable();
            $table->integer('amount')->nullable()->default(0);
            $table->string('avatar')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->integer('serial')->default(0);
            $table->boolean('display_homepage')->default(0);
            $table->boolean('featured')->default(0);
            $table->integer('views')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
