<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Red'],
            ['name' => 'Green'],
            ['name' => 'Blue'],
            ['name'=> 'Brown'],
            ['name'=> 'Orange'],
           
            ];

            foreach ($colors as $color) {
            Color::firstOrCreate([
                'name' => $color['name']
            ]);
        }
    }
}
