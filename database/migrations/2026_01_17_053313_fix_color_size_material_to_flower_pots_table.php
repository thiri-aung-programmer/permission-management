<?php

use App\Models\Color;
use App\Models\Material;
use App\Models\Size;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('flower_pots', function (Blueprint $table) {
            // 1. Drop the old string columns
            $table->dropColumn(['size', 'color', 'material']);
        });

        Schema::table('flower_pots', function (Blueprint $table) {
            // 2. Add the new foreign key columns
            $table->foreignId('color_id')->constrained()->cascadeOnDelete();
            $table->foreignId('size_id')->constrained()->cascadeOnDelete();
            $table->foreignId('material_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flower_pots', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Color::class);
            $table->dropConstrainedForeignIdFor(Size::class);
            $table->dropConstrainedForeignIdFor(Material::class);
        });
        Schema::table('flower_pots', function (Blueprint $table) {

            $table->string('color');
            $table->string('size');
            $table->string('material');
        });
    }
};
