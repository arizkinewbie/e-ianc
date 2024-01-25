<?php

namespace Database\Seeders;

use App\Models\SelecPragAssis;
use Illuminate\Database\Seeder;

class SelecPragAssisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPragAssis::create([
            'pa_name' => 'Tidak ada'
        ]);
        SelecPragAssis::create([
            'pa_name' => 'Keluarga'
        ]);
        SelecPragAssis::create([
            'pa_name' => 'Dukun'
        ]);
        SelecPragAssis::create([
            'pa_name' => 'Bidan'
        ]);
        SelecPragAssis::create([
            'pa_name' => 'dr. Umum'
        ]);
        SelecPragAssis::create([
            'pa_name' => 'dr. Spesialis'
        ]);
        SelecPragAssis::create([
            'pa_name' => 'Lainnya'
        ]);
    }
}
