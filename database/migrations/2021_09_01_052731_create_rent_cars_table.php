<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_cars', function (Blueprint $table) {
            $table->id();
            $table->string('carname');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('registernumber');
            $table->string('ownername');
            $table->bigInteger('ownercnic');
            $table->string('location');
            $table->string('image');
            $table->string('description');
            $table->bigInteger('hourlyrate');
            $table->foreignId('driverid')->nullable();
            // $table->foreign('driverid')->references('id')->on('drivers')->onDelete('cascade');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('rent_cars');
    }
}
