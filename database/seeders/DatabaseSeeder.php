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
            RoleHasPermissionsTableSeeder::class,
            UserSeeder::class,
        ]);

        $this->command->info('Running User factory...');
        \App\Models\User::factory(10)->create();

        $this->command->info('Running Provaider factory...');
        \App\Models\Provaider::factory(20)->create();

        $this->command->info('Running Periphel factory...');
        \App\Models\Periphel::factory(200)->create();

        $this->command->info('Running Software factory...');
        \App\Models\Software::factory(200)->create();

        $this->command->info('Running Hardware factory...');
        \App\Models\Hardware::factory(400)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
    //php artisan iseed permissions,roles
}
