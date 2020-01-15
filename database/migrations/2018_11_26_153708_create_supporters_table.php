<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('full_name');
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->string('yahoo')->nullable();
            $table->text('content')->nullable();
            $table->integer('serial')->default(0);
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supporters');
    }
}
