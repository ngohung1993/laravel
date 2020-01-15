<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('avatar')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->integer('serial')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('released')->default(0);
            $table->integer('parent_id')->nullable();
            $table->string('link')->nullable();
            $table->string('placeholder')->nullable();
            $table->text('value')->nullable();
            $table->text('content')->nullable();
            $table->text('frame')->nullable();
            $table->string('alt')->nullable();
            $table->string('key')->nullable(false)->unique();
            $table->integer('type')->nullable(false);

            $table->unsignedInteger('theme_id');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_fields');
    }
}
