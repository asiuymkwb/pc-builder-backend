<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compatibility_rules', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name', 150);
            $table->string('category_a', 100);
            $table->string('spec_key_a', 100);
            $table->string('category_b', 100);
            $table->string('spec_key_b', 100);
            $table->string('operator', 20); // equals, contains, lte, gte, not_equals
            $table->boolean('is_blocking')->default(true);
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compatibility_rules');
    }
};
