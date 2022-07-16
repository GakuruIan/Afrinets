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

        Schema::create('customers', function (Blueprint $table) {
            $table->id('customerID');
            $table->unsignedBigInteger('hotelID');
            $table->foreign('hotelID')->references('hotelID')->on('companies')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->integer('nationalID');
            $table->date('checkout');
            $table->date('checkin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
