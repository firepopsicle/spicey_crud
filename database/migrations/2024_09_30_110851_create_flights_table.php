<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->string('destination');
            $table->dateTime('departure_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
