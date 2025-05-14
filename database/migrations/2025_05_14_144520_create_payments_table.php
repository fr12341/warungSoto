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
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
                $table->string('payment_gateway'); // misal: midtrans, xendit, dsb
                $table->string('transaction_id')->unique();
                $table->decimal('amount', 12, 2);
                $table->enum('status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
                $table->text('payload')->nullable(); // untuk menyimpan response JSON dari gateway
                $table->timestamps();
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
