<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $sizes = [
            ['name' => 'sm'],
            ['name' => 'md'],
            ['name' => 'lg'],
            ['name' => 'xl'],
            ['name' => '2xl'],
            ];

            foreach ($sizes as $size) {
            Size::firstOrCreate([
                'name' => $size['name']
            ]);
        }
    }
}
