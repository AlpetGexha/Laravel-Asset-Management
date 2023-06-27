<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UserSeeder::class,
        ]);

        try {
            \App\Models\User::factory(10)->create();
            \App\Models\Provaider::factory(20)->create();
            \App\Models\Periphel::factory(200)->create();
            \App\Models\Software::factory(200)->create();
            \App\Models\Hardware::factory(400)->create();
        } catch (\Exception $e) {
            // skip that error and continiue

        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
    //php artisan iseed permissions,roles
}
