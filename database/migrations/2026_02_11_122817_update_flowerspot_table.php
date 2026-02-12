<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Color;
use App\Models\Size;
use App\Models\Material;

return new class extends Migration
{
    public function up(): void
    {
        // 1️⃣ Add new foreign key columns (nullable first)
        Schema::table('flower_pots', function (Blueprint $table) {
            $table->foreignId('color_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('size_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('material_id')->nullable()->constrained()->nullOnDelete();
        });

        // 2️⃣ Migrate old string data to related tables and update FK
        DB::table('flower_pots')->orderBy('id')->chunk(100, function ($pots) {
            foreach ($pots as $pot) {

                $color = Color::firstOrCreate([
                    'name' => $pot->color
                ]);

                $size = Size::firstOrCreate([
                    'name' => $pot->size
                ]);

                $material = Material::firstOrCreate([
                    'name' => $pot->material
                ]);

                DB::table('flower_pots')
                    ->where('id', $pot->id)
                    ->update([
                        'color_id' => $color->id,
                        'size_id' => $size->id,
                        'material_id' => $material->id,
                    ]);
            }
        });

        // 3️⃣ Drop old string columns AFTER data migrated
        Schema::table('flower_pots', function (Blueprint $table) {
            $table->dropColumn(['color','size','material']);
        });
    }

    public function down(): void
    {
        // 1️⃣ Recreate old string columns
        Schema::table('flower_pots', function (Blueprint $table) {
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('material')->nullable();
        });

        // 2️⃣ Restore string values from FK
        DB::table('flower_pots')->orderBy('id')->chunk(100, function ($pots) {
            foreach ($pots as $pot) {

                $color = Color::find($pot->color_id);
                $size = Size::find($pot->size_id);
                $material = Material::find($pot->material_id);

                DB::table('flower_pots')
                    ->where('id', $pot->id)
                    ->update([
                        'color' => $color?->name,
                        'size' => $size?->name,
                        'material' => $material?->name,
                    ]);
            }
        });

        // 3️⃣ Drop foreign keys
        Schema::table('flower_pots', function (Blueprint $table) {
            $table->dropConstrainedForeignId('color_id');
            $table->dropConstrainedForeignId('size_id');
            $table->dropConstrainedForeignId('material_id');
        });
    }
};
