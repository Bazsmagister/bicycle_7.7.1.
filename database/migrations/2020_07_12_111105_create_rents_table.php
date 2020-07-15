<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bicycle_id');


            $table->timestamp('rentStarted_at')->default(Carbon::now());
            $table->timestamp('rentEnds_at')->default(Carbon::now()->addDay(1));
            $table->timestamp('bicycleReturned_at')->nullable()->default(null);

            $table->boolean('is_closed')->nullable()->default('0');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bicycle_id')->references('id')->on('bicycle_to_rents')->onDelete('cascade')->onUpdate('cascade');

            //$table->foreignId('user_id')->constrained();
            //$table->foreignId('user_id')->constrained('users');
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('user_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
