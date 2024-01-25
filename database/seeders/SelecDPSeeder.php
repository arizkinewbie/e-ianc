<?php

namespace Database\Seeders;

use App\Models\SelecPregDes;
use Illuminate\Database\Seeder;

class SelecDPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPregDes::create([
            'pd_name' => '0 tahun',
        ]);
        SelecPregDes::create([
            'pd_name' => '< 2 tahun',
        ]);
        SelecPregDes::create([
            'pd_name' => '2 - 9 tahun',
        ]);
        SelecPregDes::create([
            'pd_name' => '> 9 tahun',
        ]);
    }
}
