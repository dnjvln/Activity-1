<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up(): void
    { 
        DB::statement("UPDATE orders SET status = 'Ordered' WHERE status NOT IN ('PendingOrder', 'Ordered')");
         
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('PendingOrder', 'Ordered') DEFAULT 'PendingOrder'");
    }
 
    public function down(): void
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('PendingOrder', 'Ordered', 'Processing', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'PendingOrder'");
    }
};