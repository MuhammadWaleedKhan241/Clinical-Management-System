<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceBillsTable extends Migration
{
    public function up()
    {
        Schema::create('service_bills', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->decimal('amount', 10, 2);
            $table->date('bill_date');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('payment_type')->nullable();
            $table->string('invoice_no')->nullable();
            $table->decimal('service_amount', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_bills');
    }
}