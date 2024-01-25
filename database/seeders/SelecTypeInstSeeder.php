<?php

namespace Database\Seeders;

use App\Models\SelecTypeInst;
use Illuminate\Database\Seeder;

class SelecTypeInstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecTypeInst::create([
            'ti_name' => 'RS/RS ODHA'
        ]);

        SelecTypeInst::create([
            'ti_name' => 'RSIA/RSB'
        ]);

        SelecTypeInst::create([
            'ti_name' => 'Puskesmas'
        ]);

        SelecTypeInst::create([
            'ti_name' => 'Klinik/Poliklinik Bersalin'
        ]);

        SelecTypeInst::create([
            'ti_name' => 'Posyandu'
        ]);

        SelecTypeInst::create([
            'ti_name' => 'Praktik Mandiri Bidan'
        ]);
    }
}
