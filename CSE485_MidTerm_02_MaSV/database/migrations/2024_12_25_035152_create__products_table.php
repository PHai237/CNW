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
        Schema::create('_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 100)->unique();
            $table->string('description', 255);
            $table->decimal('price', 10, 2);
            $table->string('image', 255);
            $table->string('category_name',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_products');
    }
};
