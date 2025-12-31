<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // note: role should have permissoin 
        $role = Role::firstOrCreate(
            [
                "name" => "admin",
            ],
            [
                "name" => "admin",
            ]
        );

        $permission_ids = Permission::pluck('id')->toArray();
        $role->permissions()->attach($permission_ids);

        // NOTE တစ်ယောက်အတွက်ပဲ first သုံးမယ်ဆို one-dim array ဖြစ်ရပါမယ်
        $adminuser = [
            'name' => 'Mg Mg',
            'username' => 'Mg Mg',
            'phone' => '091234567',
            'email' => 'mgmg@gmail.com',
            'address' => 'Mandalay',
            'password' => bcrypt('mgmg123'), // NOTE: CAST ထားပီးရင် BCRYPT လုပ်စရာမလိုပါ လုပ်လည်းရပါတယ် 
            'is_active' => '1',
            'gender' => '1',
            'role_id' => $role->id // NOTE ဒါမျိုးသုံးပါ

        ];


        AdminUser::firstOrCreate(
            [
                'email' => 'mgmg@gmail.com',
            ],
            [
                'name' => $adminuser['name'],
                'username' => $adminuser['username'],
                'phone' => $adminuser['phone'],
                'email' => $adminuser['email'],
                'address' => $adminuser['address'],
                'password' => $adminuser['password'],
                'is_active' => $adminuser['is_active'],
                'gender' => $adminuser['gender'],
                'role_id' => $adminuser['role_id'],

            ]
        );

    }
}
