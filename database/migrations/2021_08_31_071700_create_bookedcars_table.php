<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedcarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookedcars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id');
            $table->foreign('car_id')->references('id')->on('sale_cars')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('addressline1');
            $table->string('addressline2');
            $table->integer('status')->nullable()->default(1);
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
        Schema::dropIfExists('bookedcars');
    }
}
