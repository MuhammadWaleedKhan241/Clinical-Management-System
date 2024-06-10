<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_no');
            $table->json('select_type');
            // $table->json('select_department');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->text('address');
            $table->string('education');
            $table->string('description');
            $table->text('certificate');
            $table->string('speciality');
            $table->json('working_days');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};