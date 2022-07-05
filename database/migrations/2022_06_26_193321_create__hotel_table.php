<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('hotel', function (Blueprint $table) {
            $table->id('hotelID');
            $table->integer('companyID');
            $table->string('location');
            $table->string('amenities');
            $table->integer('Rating');
            $table->integer('pricing');
            $table->string('roomDetails');
            $table->string('snap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel');
    }
};
