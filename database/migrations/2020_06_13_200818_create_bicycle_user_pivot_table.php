<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBicycleUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicycle_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('bicycle_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamp('rentStarted_at')->default(Carbon::yesterday());
            $table->timestamp('rentEnds_at')->default(now());


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
        Schema::dropIfExists('bicycle_user');
    }
}
