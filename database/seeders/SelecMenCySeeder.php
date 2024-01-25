<?php

namespace Database\Seeders;

use App\Models\SelecMenCy;
use Illuminate\Database\Seeder;

class SelecMenCySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecMenCy::create([
            'mc_name' => '< 3 Hari'
        ]);
        SelecMenCy::create([
            'mc_name' => '3 - 7 Hari'
        ]);
        SelecMenCy::create([
            'mc_name' => '> 7 Hari'
        ]);
    }
}
