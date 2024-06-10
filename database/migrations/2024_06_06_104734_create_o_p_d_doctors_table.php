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
            Schema::create('o_p_d_doctors', function (Blueprint $table) {
                $table->id();
                $table->string('full_name');
                $table->string('phone_no'); // Changed from decimal to string
                $table->json('select_department'); 
                $table->text('opd_fee');
                $table->timestamps();
                $table->softDeletes();
            });      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_p_d_doctors');
    }
};