<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->autoIncrement();
            $table->double('voltage_r');
            $table->double('voltage_s');
            $table->double('voltage_t');
            $table->double('current_r');
            $table->double('current_s');
            $table->double('current_t');
            $table->double('power_r');
            $table->double('power_s');
            $table->double('power_t');
            $table->double('apparent_power_r');
            $table->double('apparent_power_s');
            $table->double('apparent_power_t');
            $table->double('power_factor_r');
            $table->double('power_factor_s');
            $table->double('power_factor_t');
            $table->unsignedSmallInteger('device_id');
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
        Schema::dropIfExists('sensors');
    }
}
