<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaketripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maketrips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('contact');
            $table->string('picklocation');
            $table->string('droplocation');
            $table->dateTime('pickdatetime');
            $table->dateTime('dropdatetime');
            $table->bigInteger('charges');
            $table->foreignId('car_id');
            $table->foreign('car_id')->references('id')->on('rent_cars')->onDelete('cascade');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('maketrips');
    }
}
