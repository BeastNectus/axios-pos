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
            $table->string('product_code');
            $table->string('name')->nullable();
            $table->string('description');
            $table->Integer('qty_stock')->nullable();
            $table->Integer('on_hand');
            $table->Integer('price')->nullable();
            $table->Integer('category_id')->nullable();
            $table->Integer('supplier_id')->nullable();
            $table->Integer('date_stock_in');
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
