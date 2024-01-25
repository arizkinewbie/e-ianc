<?php

namespace Database\Seeders;

use App\Models\SelecTt;
use Illuminate\Database\Seeder;

class SelecTtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecTt::create([
            'tt_name' => 'T0'
        ]);
        SelecTt::create([
            'tt_name' => 'T1'
        ]);
        SelecTt::create([
            'tt_name' => 'T2'
        ]);
        SelecTt::create([
            'tt_name' => 'T3'
        ]);
        SelecTt::create([
            'tt_name' => 'T4'
        ]);
        SelecTt::create([
            'tt_name' => 'T5'
        ]);
        SelecTt::create([
            'tt_name' => 'Lengkap'
        ]);
    }
}
