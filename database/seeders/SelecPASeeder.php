<?php

namespace Database\Seeders;

use App\Models\SelecPregAge;
use Illuminate\Database\Seeder;

class SelecPASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPregAge::create([
            'pa_name' => '< 17 tahun',
        ]);
        SelecPregAge::create([
            'pa_name' => '17 - 34 tahun',
        ]);
        SelecPregAge::create([
            'pa_name' => '> 34 tahun',
        ]);
    }
}
