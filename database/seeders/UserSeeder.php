<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::create([
           'name' => 'Admin',
           'email' => 'admin@gmail.com',
           'password' => 'admin', // This will be hashed by the mutator
           'image'    => 'asset/images/profile/1.jpg',
        ]);
        $adminUser->assignRole('admin');

        $testAdminUser = User::create([
            'name' => 'Test-Admin',
            'email' => 'test@admin.com',
            'password' => 'admin@123', // This will be hashed by the mutator
            'image'    => 'asset/images/profile/1.jpg',
        ]);
        $testAdminUser->assignRole('admin');

        $operatorUser = User::create([
            'name' => 'Operator',
            'email' => 'operator@emu.com',
            'password' => 'operator', // This will be hashed by the mutator
            'branch_id' => 1,
            'image'    => 'asset/images/profile/1.jpg',
        ]);
        $operatorUser->assignRole('operator');
    }
}
