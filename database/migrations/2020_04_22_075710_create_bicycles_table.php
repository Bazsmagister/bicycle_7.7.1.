<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->timestamp('bicycle_broughtIn_at')->nullable();
            $table->timestamp('bicycle_startedToServiceIt_at')->nullable();
            $table->timestamp('bicycle_readyToTakeItHome_at')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->string('description')->nullable();
            $table->boolean('isrentable')->nullable();

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
        Schema::dropIfExists('bicycles');
    }
}

