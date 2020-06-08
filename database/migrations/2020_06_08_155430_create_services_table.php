<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bicycle_id');

            $table->timestamp('broughtIn_at')->nullable();
            $table->timestamp('startedToService_at')->nullable();
            $table->timestamp('readyToTakeHome_at')->nullable()->default(Carbon::tomorrow());

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bicycle_id')->references('id')->on('bicycles');


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
        Schema::dropIfExists('services');
    }
}
