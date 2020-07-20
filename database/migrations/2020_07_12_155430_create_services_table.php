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
            $table->unsignedBigInteger('serviceman_id');

            $table->text('failure_description')->nullable();

            // default(Carbon::now()->subDays(1));
            // default(Carbon::now());
            // default(Carbon::tomorrow());

            // $table->timestamp('broughtIn_at')->nullable();
            // $table->timestamp('startedToService_at')->nullable();
            // $table->timestamp('readyToTakeIt_at')->nullable();
            // $table->timestamp('taken_at')->nullable();

            $table->timestamp('accepted')->nullable();
            $table->timestamp('repairing')->nullable();
            $table->timestamp('ready')->nullable();
            $table->timestamp('taken')->nullable();


            $table->string('notes')->nullable();

            //$table->enum('status', ['accepted','repairing','ready','taken'])->nullable();

            //$table->boolean('isActive')->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bicycle_id')->references('id')->on('bicycle_to_services')->onDelete('cascade')->onUpdate('cascade');

            //$table->foreignId('user_id')->constrained();
            //$table->foreignId('user_id')->constrained('users');
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('user_id')->nullable()->constrained();

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
