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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit_type');
            $table->decimal('price', 10, 2);
            $table->decimal('discount_percentage', 5, 2);
            $table->decimal('discount_amount', 10, 2);
            $table->date('discount_start_date');
            $table->date('discount_end_date');
            $table->decimal('tax_percentage', 5, 2);
            $table->decimal('tax_amount', 10, 2);
            $table->integer('stock_quantity');
            $table->json('images')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
