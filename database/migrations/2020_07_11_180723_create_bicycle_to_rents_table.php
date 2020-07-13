<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicycleToRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicycle_to_rents', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('bicycle_id');
            $table->string('name')->nullable();

            //$table->unsignedBigInteger('user_id')->nullable();

            $table->string('image')->nullable();

            // $table->timestamp('rentStarted_at')->nullable();
            // $table->timestamp('rentEnds_at')->nullable();

            $table->integer('rent_price')->nullable();
            $table->string('description', 160)->nullable();

            $table->boolean('is_availableToRent')->nullable();


            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('bicycle_to_rents');
    }
}
