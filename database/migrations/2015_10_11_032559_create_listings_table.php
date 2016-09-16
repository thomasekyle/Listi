<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id');
            $table->integer('pic_num');
            $table->integer('user_id');
            $table->string('unit_name');
            $table->string('available')
            $table->date('date_available');
            $table->string('house_number');
            $table->string('street_name');
            $table->string('unit_num');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('subdivision');
            $table->string('sqaure_feet');
            $table->string('type');
            $table->string('price');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('description');
            $table->string('search_query');
            $table->integer('featured_pic');
            $table->string('featured_filename');
            $table->timestamp('added_on');
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
