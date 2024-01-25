<?php

namespace Database\Seeders;

use App\Models\SelecDisease;
use Illuminate\Database\Seeder;

class SelecDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecDisease::create([
            'sd_name' => 'Tidak ada'
        ]);
        SelecDisease::create([
            'sd_name' => 'Kurang Darah'
        ]);
        SelecDisease::create([
            'sd_name' => 'Malaria'
        ]);
        SelecDisease::create([
            'sd_name' => 'TBC Paru'
        ]);
        SelecDisease::create([
            'sd_name' => 'Jantung'
        ]);
        SelecDisease::create([
            'sd_name' => 'Diabetes Melitus'
        ]);
        SelecDisease::create([
            'sd_name' => 'IMS/HVI AIDS'
        ]);
        SelecDisease::create([
            'sd_name' => 'Epilepsi'
        ]);
        SelecDisease::create([
            'sd_name' => 'Hati'
        ]);
        SelecDisease::create([
            'sd_name' => 'Psikosis'
        ]);
        SelecDisease::create([
            'sd_name' => 'Ginjal'
        ]);
        SelecDisease::create([
            'sd_name' => 'Hipertensi'
        ]);
        SelecDisease::create([
            'sd_name' => 'Asma'
        ]);
        SelecDisease::create([
            'sd_name' => 'Diabetes'
        ]);
    }
}
