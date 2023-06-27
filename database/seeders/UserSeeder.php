<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ])
            ->count(1)
            ->withPersonalCompany()
            ->withEmployee(30)
            ->withSuperAdminRole()
            ->create();

        User::factory([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
        ])
            ->count(1)
            ->withPersonalCompany()
            ->withEmployee(3)
            ->create();
    }
}
