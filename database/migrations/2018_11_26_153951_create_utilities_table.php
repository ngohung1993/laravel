<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable(false);
            $table->string('icon')->nullable();
            $table->string('path')->nullable();
            $table->integer('serial')->nullable()->default(0);
            $table->integer('status')->nullable()->default(1);
            $table->integer('released')->nullable()->default(1);
            $table->integer('parent_id')->nullable();
            $table->integer('permission')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilities');
    }
}
