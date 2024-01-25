<?php

namespace Database\Seeders;

use App\Models\SelecVaksinService;
use Illuminate\Database\Seeder;

class SelecVaksinServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecVaksinService::create([
            'vas_name' => 'Hepatitis A (HA)'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Hepatitis B (HB)'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'BCG'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Campak'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'DPT/HB/Hib 1'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'DPT/HB/Hib 2'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'DPT/HB/Hib 3'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'DPT/HB'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'DT'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Polio 1'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Polio 2'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Polio 3'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Polio 4'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'TD'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'TT'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'IPV'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Pediacel'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'MR/MMR'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Pneumokokus (PCV)'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Rotavirus'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Tifoid'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Varisela'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Influenza'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'HPV (Human Papillomavirus)'
        ]);

        SelecVaksinService::create([
            'vas_name' => 'Apanese Encephalitis (JE)'
        ]);
    }
}
