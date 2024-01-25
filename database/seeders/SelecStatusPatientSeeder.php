<?php

namespace Database\Seeders;

use App\Models\SelecStatusPatient;
use Illuminate\Database\Seeder;

class SelecStatusPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecStatusPatient::create([
            'ssp_name' => 'Suami'
        ]);
        SelecStatusPatient::create([
            'ssp_name' => 'Istri'
        ]);
        SelecStatusPatient::create([
            'ssp_name' => 'Bapak'
        ]);
        SelecStatusPatient::create([
            'ssp_name' => 'Ibu'
        ]);
        SelecStatusPatient::create([
            'ssp_name' => 'Anak'
        ]);
    }
}
