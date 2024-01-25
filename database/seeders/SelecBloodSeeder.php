<?php

namespace Database\Seeders;

use App\Models\SelecBlood;
use Illuminate\Database\Seeder;

class SelecBloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecBlood::create([
            'blo_name' => 'Tidak Diketahui'
        ]);

        SelecBlood::create([
            'blo_name' => 'A -'
        ]);

        SelecBlood::create([
            'blo_name' => 'A +'
        ]);

        SelecBlood::create([
            'blo_name' => 'B -'
        ]);

        SelecBlood::create([
            'blo_name' => 'B +'
        ]);

        SelecBlood::create([
            'blo_name' => 'AB -'
        ]);

        SelecBlood::create([
            'blo_name' => 'AB +'
        ]);

        SelecBlood::create([
            'blo_name' => 'O -'
        ]);

        SelecBlood::create([
            'blo_name' => 'O +'
        ]);
    }
}
