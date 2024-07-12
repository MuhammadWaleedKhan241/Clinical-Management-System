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
        Schema::create('opd_bills', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->decimal('amount', 10, 2);
            $table->date('bill_date');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->string('payment_type');
            $table->string('invoice_no');
            $table->decimal('service_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opd_bills');
    }
};