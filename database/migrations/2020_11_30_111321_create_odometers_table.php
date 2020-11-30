<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdometersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odometers', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->integer('odometer');
            $table->integer('user_id');
            $table->integer('distance_traveled');
            $table->boolean('is_kms');
            $table->date('date_of_travel');
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
        Schema::dropIfExists('odometers');
    }
}
