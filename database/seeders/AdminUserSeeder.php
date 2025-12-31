<?php

namespace Database\Seeders;

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
        //
        $role=Role::firstOrCreate([
            "name"=> "admin",
        ],
        [
            "name"=> "admin",
        ]
        );
         $adminuser = [
            'name' => 'Mg Mg',            
            'username'=>'Mg Mg',
            'phone'=>'091234567',
            'email'=>'mgmg@gmail.com',
            'address'=>'Mandalay',
            'password'=> 'mgmg123',
            'is_active'=>'1',
            'gender'=>'1',
            'role_id'=>1
        
            
            ];

           
            AdminUser::firstOrCreate([
                 'email'=>'mgmg@gmail.com',
            ],
            [
                'name' => $adminuser['name'],
                'username'=> $adminuser['username'],
                'phone'=> $adminuser['phone'],
                'email'=> $adminuser['email'],
                'address'=> $adminuser['address'],
                'password'=> $adminuser['password'],
                'is_active'=> $adminuser['is_active'],
                'gender'=> $adminuser['gender'],
                'role_id'=> $adminuser['role_id'],
       
            ]
        );
        
    }
}
