<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('doctor_id', 'fk_appointment_to_doctor')->references('id')->on('doctor')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id', 'fk_appointment_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('consultation_id', 'fk_appointment_to_consultation')->references('id')->on('consultation')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('fk_appointment_to_doctor');
            $table->dropForeign('fk_appointment_to_users');
            $table->dropForeign('fk_appointment_to_consultation');
        });
    }
}
