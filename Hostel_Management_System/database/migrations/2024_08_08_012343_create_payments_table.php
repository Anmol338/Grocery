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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id'); // Define the column
            $table->double('amount');
            $table->timestamp('payment_date')->useCurrent();
            $table->enum('payment_method', [
                'Cash',
                'Cheque',
                'Online Banking',
                'Mobile Banking',
                'Esewa',
                'Khalti',
                'IME Pay',
                'Connect IPS'
            ]);
            $table->enum('status', ['Pending', 'Completed', 'Failed'])->default('Pending');
            $table->timestamps();

            // Add the foreign key constraint in a separate statement
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
