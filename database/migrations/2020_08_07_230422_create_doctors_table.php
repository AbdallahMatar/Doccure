<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('email', 45)->unique();
            $table->string('mobile', 45)->unique();
            $table->string('password');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date');
            $table->mediumText('about');
            $table->enum('status', ['Active', 'InActive', 'Blocked'])->default('Active');
            $table->enum('pricing', ['Free', 'PerHour']);
            $table->integer('hour_price');
            $table->string('facebook_url', 45);
            $table->string('twitter_url', 45);
            $table->string('linked_in_url', 45);
            $table->string('image', 100);

            $table->foreignId('speciality_id');
            $table->foreign('speciality_id')->references('id')->on('specialities');

            $table->foreignId('state_id');
            $table->foreign('state_id')->references('id')->on('states');

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
        Schema::dropIfExists('doctors');
    }
}
