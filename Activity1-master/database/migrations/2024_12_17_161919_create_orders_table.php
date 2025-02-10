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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->text('delivery_address')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('payment_method', ['COD', 'Debit/CreditCard'])->nullable();
            $table->enum('status', ['PendingOrder', 'Ordered'])->default('PendingOrder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
