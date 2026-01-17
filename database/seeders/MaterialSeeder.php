<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            ['name' => 'Plastics'],
            ['name' => 'Soil'],
            ['name' => 'Ceramic'],
           
            ];

            foreach ($materials as $material) {
            Material::firstOrCreate([
                'name' => $material['name']
            ]);
        }

    }
}
