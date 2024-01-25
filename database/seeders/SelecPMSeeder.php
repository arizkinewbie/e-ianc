<?php

namespace Database\Seeders;

use App\Models\SelecPregMarr;
use Illuminate\Database\Seeder;

class SelecPMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPregMarr::create([
            'pm_name' => '< 1 tahun',
        ]);

        SelecPregMarr::create([
            'pm_name' => '1 - 3 tahun',
        ]);

        SelecPregMarr::create([
            'pm_name' => '>= 4 tahun',
        ]);
    }
}
