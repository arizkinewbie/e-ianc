<?php

namespace Database\Seeders;

use App\Models\SelecPregWith;
use Illuminate\Database\Seeder;

class SelecPWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPregWith::create([
            'pw_name' => 'Belum Pernah'
        ]);
        SelecPregWith::create([
            'pw_name' => 'Normal'
        ]);
        SelecPregWith::create([
            'pw_name' => 'Tindakan Caesar'
        ]);
        SelecPregWith::create([
            'pw_name' => 'Tarikan Tang / Vacuum'
        ]);
        SelecPregWith::create([
            'pw_name' => 'Uri Dirogoh'
        ]);
        SelecPregWith::create([
            'pw_name' => 'Diberi Infus / Transfusi'
        ]);
    }
}
