<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('email', 45)->unique();
            $table->string('mobile', 45)->unique();
            $table->string('password');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date');
            $table->enum('status', ['Active', 'InActive', 'Blocked'])->default('Active');
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'o+', 'o-'])->default('A+');
            $table->string('image', 100);

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
        Schema::dropIfExists('patients');
    }
}
