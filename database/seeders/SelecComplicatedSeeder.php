<?php

namespace Database\Seeders;

use App\Models\SelecComplicated;
use Illuminate\Database\Seeder;

class SelecComplicatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecComplicated::create([
            'com_name' => 'HDK'
        ]);
        SelecComplicated::create([
            'com_name' => 'Abortus'
        ]);
        SelecComplicated::create([
            'com_name' => 'Pendarahan'
        ]);
        SelecComplicated::create([
            'com_name' => 'Infeksi'
        ]);
        SelecComplicated::create([
            'com_name' => 'KPD'
        ]);
        SelecComplicated::create([
            'com_name' => 'Lain-lain'
        ]);
    }
}
