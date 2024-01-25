<?php

namespace Database\Seeders;

use App\Models\SelecVaksin;
use Illuminate\Database\Seeder;

class SelecVaksinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecVaksin::create([
            'va_name' => 'Hepatitis A (HA)'
        ]);

        SelecVaksin::create([
            'va_name' => 'Hepatitis B (HB)'
        ]);

        SelecVaksin::create([
            'va_name' => 'BCG'
        ]);

        SelecVaksin::create([
            'va_name' => 'Campak'
        ]);

        SelecVaksin::create([
            'va_name' => 'DPT/HB/Hib'
        ]);

        SelecVaksin::create([
            'va_name' => 'DPT/HB'
        ]);

        SelecVaksin::create([
            'va_name' => 'DT'
        ]);

        SelecVaksin::create([
            'va_name' => 'Polio'
        ]);

        SelecVaksin::create([
            'va_name' => 'TD'
        ]);

        SelecVaksin::create([
            'va_name' => 'TT'
        ]);

        SelecVaksin::create([
            'va_name' => 'IPV'
        ]);

        SelecVaksin::create([
            'va_name' => 'Pediacel'
        ]);

        SelecVaksin::create([
            'va_name' => 'MR/MMR'
        ]);

        SelecVaksin::create([
            'va_name' => 'Pneumokokus (PCV)'
        ]);

        SelecVaksin::create([
            'va_name' => 'Rotavirus'
        ]);

        SelecVaksin::create([
            'va_name' => 'Tifoid'
        ]);

        SelecVaksin::create([
            'va_name' => 'Varisela'
        ]);

        SelecVaksin::create([
            'va_name' => 'Influenza'
        ]);

        SelecVaksin::create([
            'va_name' => 'HPV (Human Papillomavirus)'
        ]);

        SelecVaksin::create([
            'va_name' => 'Apanese Encephalitis (JE)'
        ]);
    }
}
