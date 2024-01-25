<?php

namespace Database\Seeders;

use App\Models\SelecPatVisit;
use Illuminate\Database\Seeder;

class SelecPatVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPatVisit::create([
            'spv_name' => 'Kemauan Sendiri'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Anjuran Dokter'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Anjuran Bidan'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Bidan'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Dokter'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Dukun Anak'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Polindes'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Pustus'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Puskesmas'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Rumah Bersalin'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan RSIA'
        ]);
        SelecPatVisit::create([
            'spv_name' => 'Rujukan Kader'
        ]);
    }
}
