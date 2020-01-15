<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class UserData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'username' => 'senior',
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
            'permission' => User::ROLE_SENIOR
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'username' => 'admin',
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
            'permission' => User::ROLE_ADMIN
        ]);
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
