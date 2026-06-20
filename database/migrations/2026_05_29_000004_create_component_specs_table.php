<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('component_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('component_id')->constrained()->cascadeOnDelete();
            $table->string('spec_key', 100);
            $table->string('spec_value', 255);
            $table->timestamps();

            $table->index(['component_id', 'spec_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('component_specs');
    }
};
