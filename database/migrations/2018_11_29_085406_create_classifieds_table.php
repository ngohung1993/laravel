<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifieds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->integer('serial')->default(0);
            $table->boolean('display_homepage')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
            $table->string('slug');
            $table->text('content')->nullable();
            $table->string('acreage')->nullable();
            $table->string('price')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('contacts')->nullable();
            $table->string('contact_name')->nullable();

            $table->unsignedInteger('category_classified_id')->nullable();
            $table->foreign('category_classified_id')->references('id')->on('category_classifieds')->onDelete('cascade');

            $table->unsignedInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

            $table->unsignedInteger('ad_type_id')->nullable();
            $table->foreign('ad_type_id')->references('id')->on('ad_types')->onDelete('cascade');

            $table->unsignedInteger('province_id')->nullable()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');

            $table->unsignedInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

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
        Schema::dropIfExists('classifieds');
    }
}
