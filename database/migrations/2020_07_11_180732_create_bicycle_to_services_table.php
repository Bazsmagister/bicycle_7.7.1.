<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicycleToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicycle_to_services', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('bicycle_id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');

            $table->timestamp('broughtIn_at')->nullable();
            $table->timestamp('startedToService_at')->nullable();
            $table->timestamp('readyToTakeIt_at')->nullable();

            $table->unsignedInteger('workhours')->nullable();

            $table->string('notes', 300)->nullable();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bicycle_to_services');
    }
}
