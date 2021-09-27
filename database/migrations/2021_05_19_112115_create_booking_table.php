<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('start');
            $table->string('start_h');
            $table->date('finish');
            $table->string('finish_h');
            $table->string('firma')->nullable();
            $table->string('nip')->nullable();
            $table->integer('userId');
            $table->string('key');
            $table->integer('status');
            $table->integer('carId');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('telefon');
            $table->string('email');
            $table->string('miejscowosc');
            $table->string('kodPocztowy');
            $table->string('adres');

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
        Schema::dropIfExists('bookings');
    }
}
