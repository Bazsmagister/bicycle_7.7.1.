<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            // $table->string('email');
            $table->char('phone', 30)->nullable();
            $table->string('password')->default('secret');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();

            // $table->timestamps();
            $table->timestamp('created_at')->default(now());
            // $table->timestamp('updated_at')->default(now());
            $table->timestamp('updated_at')->nullable();


            // $table->nullableTimestamps();

            // $table->unsignedBigInteger('role_id')->index();
            // $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
