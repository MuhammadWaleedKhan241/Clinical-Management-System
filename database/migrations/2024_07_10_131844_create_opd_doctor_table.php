<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpdDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('opd_doctor', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('department');
            $table->decimal('doctor_charges', 8, 2);
            $table->decimal('opd_fee', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opd_doctor');
    }
}
