<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users');
            $table->integer('google_map plugin');
            $table->integer('properties');
            $table->string('company_name')->unique();
            $table->date('company_phone_number');
            $table->string('company_fax_number');
            $table->string('company_street_number');
            $table->string('company_street_name');
            $table->string('company_city');
            $table->string('company_state');
            $table->string('company_zip');
            $table->string('http_link');
            $table->string('http_link2');
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
        //
    }
}
