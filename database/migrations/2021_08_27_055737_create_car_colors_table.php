<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id');
            $table->foreign('car_id')->references('id')->on('sale_cars')->onDelete('cascade');
            $table->foreignId('color_id');
            $table->foreign('color_id')->references('id')->on('Colors')->onDelete('cascade');
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
        Schema::dropIfExists('car_colors');
    }
}
