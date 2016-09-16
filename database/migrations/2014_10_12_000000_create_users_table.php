<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $tables->integer('site_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->date('birthday');
            $table->string('phone_number');
            $table->string('fax_number');
            $table->string('feature_picutre');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('description');
            $table->string('active');
            $table->integer('properties');
            $table->integer('available_properties');
            $table->integer('can_mod_user');
            $table->integer('can_mod_site');
            $table->timestamp('added_on');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
