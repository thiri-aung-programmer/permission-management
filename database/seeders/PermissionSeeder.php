<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $permissions = [
            ['name' => 'view' ,'feature_id'=>1],
            ['name' => 'delete','feature_id'=>1],
            ['name' => 'edit','feature_id'=>1],
            ['name' => 'add','feature_id'=>1],
             ['name' => 'view' ,'feature_id'=>2],
            ['name' => 'delete','feature_id'=>2],
            ['name' => 'edit','feature_id'=>2],
            ['name' => 'add','feature_id'=>2],
             ['name' => 'view' ,'feature_id'=>3],
            ['name' => 'delete','feature_id'=>3],
            ['name' => 'edit','feature_id'=>3],
            ['name' => 'add','feature_id'=>3],
             ['name' => 'view' ,'feature_id'=>4],
            ['name' => 'delete','feature_id'=>4],
            ['name' => 'edit','feature_id'=>4],
            ['name' => 'add','feature_id'=>4],
             ['name' => 'view' ,'feature_id'=>5],
            ['name' => 'delete','feature_id'=>5],
            ['name' => 'edit','feature_id'=>5],
            ['name' => 'add','feature_id'=>5],
            ];

            foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permissions['name'],
                'feature_id' => $permissions['feature_id']
            ]);
        }
    }
}
