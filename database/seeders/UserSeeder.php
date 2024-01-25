<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Development',
            'email' => 'dev@gardia.com',
            'password' => bcrypt('12345678'),
            'role' => 0,
            'temoi' => 1,
            'status' => '1'
        ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@eianc.id',
            'password' => bcrypt('12345678'),
            'role' => 1,
            'temoi' => 1,
            'status' => '1'
        ]);
    }
}
