<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->nullable()->index('fk_appointment_to_doctor');
            $table->foreignId('user_id')->nullable()->index('fk_appointment_to_users');
            $table->foreignId('consultation_id')->nullable()->index('fk_appointment_to_consultation');
            $table->enum('level', [1,2,3]);
            $table->date('date');
            $table->time('time');
            $table->enum('status', [1,2]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
