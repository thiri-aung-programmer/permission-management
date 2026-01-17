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
        Schema::create('flower_pots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('color');
            $table->string('size');
            $table->string('material');
            $table->string('price');
            $table->string('stock');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flower_pots');
    }
};
