<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('martial_status', ['Single', 'Married'])->nullable();
            $table->enum('blood_group', ['AB+', 'AB-', 'A+', 'A-', 'B+', 'B-'])->nullable();;
            $table->dateTime('dob');
            $table->string('age');
            $table->string('relative_name');
            $table->string('relative_phone');
            $table->string('state');
            $table->string('district');
            $table->string('location');
            $table->string('occupation');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
