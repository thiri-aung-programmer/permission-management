<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //
        $features = [
            ['name' => 'user'],
            ['name' => 'role'],
            ['name' => 'feature'],
            ['name' => 'permission'],
            ['name' => 'stock'],
        ];

        foreach ($features as $feature) {
            Feature::firstOrCreate([
                'name' => $feature['name']
            ]);
        }
    }
}
