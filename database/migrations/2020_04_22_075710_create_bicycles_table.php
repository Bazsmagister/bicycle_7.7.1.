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
            $table->timestamp('broughtIn_at')->nullable();
            $table->timestamp('startedToService_at')->nullable();
            $table->timestamp('readyToTakeHome_at')->nullable();

            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('rent_price')->nullable()->default(2000);

            $table->string('description', 300)->nullable();
            $table->boolean('is_rentable')->nullable();
            $table->boolean('is_sellable')->nullable();
            $table->boolean('is_serviceable')->nullable();

            $table->string('image')->nullable();
            // $table->string('image',2000)->default('bic.png')->nullable();
            // $table->string('image',255)->default('/home/bazs/code/bicycle_7.7.1/public/storage/bi.jpg');
            // $table->string('image',255)->default('bic.png');


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
