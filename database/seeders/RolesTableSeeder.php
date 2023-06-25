<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 => [
                'id' => 1,
                'name' => 'super_admin',
                'guard_name' => 'web',
                'created_at' => '2023-06-25 18:53:30',
                'updated_at' => '2023-06-25 18:53:30',
            ],
            1 => [
                'id' => 2,
                'name' => 'filament_user',
                'guard_name' => 'web',
                'created_at' => '2023-06-25 18:53:30',
                'updated_at' => '2023-06-25 18:53:30',
            ],
        ]);

    }
}
