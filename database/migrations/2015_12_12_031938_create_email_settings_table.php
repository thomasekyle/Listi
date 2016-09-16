<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('email_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_address');
            $table->string('password');
            $table->string('smtp_server');
            $table->string('mail_server');
            $table->string('smtp_port');
            $table->string('mail_server_port');
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
