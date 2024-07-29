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
            Schema::create('package_test', function (Blueprint $table) {
                $table->id();

                $table->foreignId('patient_id')->constrained()->onDelete('cascade');
                $table->foreignId('package_id')->constrained()->onDelete('cascade');
                $table->enum('payment_type', ['cash', 'credit_card', 'debit_card']);
                $table->string('invoice_no');
                $table->decimal('service_amount', 10, 2);
                $table->date('bill_date');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('package_test');
        }
    };