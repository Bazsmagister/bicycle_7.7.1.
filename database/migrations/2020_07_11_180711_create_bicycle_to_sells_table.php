<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicycleToSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicycle_to_sells', function (Blueprint $table) {
            $table->id();


            //$table->unsignedBigInteger('bicycle_id');
            $table->string('name')->nullable();

            $table->string('image')->nullable();
            $table->string('price')->nullable();


            $table->string('description')->nullable();

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
        Schema::dropIfExists('bicycle_to_sells');
    }
}
