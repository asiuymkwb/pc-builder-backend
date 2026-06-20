<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name', 255);
            $table->string('brand', 100);
            $table->string('model', 150);
            $table->decimal('price', 10, 2);
            $table->smallInteger('wattage'); // consumo TDP in watt
            $table->text('image_url')->nullable();
            $table->text('buy_url')->nullable();
            $table->boolean('stock')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
