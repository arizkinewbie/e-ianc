<?php

namespace Database\Seeders;

use App\Models\SelecUnit;
use Illuminate\Database\Seeder;

class SelecUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecUnit::create([
            'u_name' => 'PCS',
            'u_status' => '1'
        ]);
        SelecUnit::create([
            'u_name' => 'Blister',
            'u_status' => '1'
        ]);
        SelecUnit::create([
            'u_name' => 'Tablet',
            'u_status' => '1'
        ]);
        SelecUnit::create([
            'u_name' => 'Kapsul',
            'u_status' => '1'
        ]);
        SelecUnit::create([
            'u_name' => 'Botol',
            'u_status' => '1'
        ]);
        SelecUnit::create([
            'u_name' => 'Ampul',
            'u_status' => '1'
        ]);
        SelecUnit::create([
            'u_name' => 'Vial',
            'u_status' => '1'
        ]);
    }
}
