<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \Spatie\Permission\Models\Role::create(['name' => 'super_admin']);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ])->assignRole('super_admin');

        \App\Models\User::factory(10)->create();
        \App\Models\Provaider::factory(20)->create();
        \App\Models\Periphel::factory(30)->create();
        \App\Models\Software::factory(200)->create();
        \App\Models\Hardware::factory(400)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
