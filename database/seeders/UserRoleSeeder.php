<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'user_role_code' => 0,
            'user_role_name' => 'SU',
            'user_role_status' => '1'
        ]);

        UserRole::create([
            'user_role_code' => 1,
            'user_role_name' => 'Administrator',
            'user_role_status' => '1'
        ]);

        UserRole::create([
            'user_role_code' => 2,
            'user_role_name' => 'Kecamatan',
            'user_role_status' => '1'
        ]);

        UserRole::create([
            'user_role_code' => 3,
            'user_role_name' => 'Kelurahan/Desa',
            'user_role_status' => '1'
        ]);

        UserRole::create([
            'user_role_code' => 4,
            'user_role_name' => 'Bidan Praktik',
            'user_role_status' => '1'
        ]);
    }
}
