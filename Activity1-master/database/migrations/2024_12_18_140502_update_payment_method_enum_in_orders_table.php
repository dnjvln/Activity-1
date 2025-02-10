<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    { 
        DB::statement("UPDATE orders SET payment_method = 'card' WHERE payment_method = 'Debit/CreditCard'");
         
        DB::statement("ALTER TABLE orders MODIFY COLUMN payment_method ENUM('COD', 'card') NULL");
    }

    public function down(): void
    { 
        DB::statement("ALTER TABLE orders MODIFY COLUMN payment_method ENUM('COD', 'Debit/CreditCard') NULL");
         
        DB::statement("UPDATE orders SET payment_method = 'Debit/CreditCard' WHERE payment_method = 'card'");
    }
};