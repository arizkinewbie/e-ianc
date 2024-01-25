<?php

namespace Database\Seeders;

use App\Models\SelecPragBloodAssis;
use Illuminate\Database\Seeder;

class SelecPragBloodAssisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPragBloodAssis::create([
            'pda_name' => 'Tidak Ada'
        ]);
        SelecPragBloodAssis::create([
            'pda_name' => 'Suami'
        ]);
        SelecPragBloodAssis::create([
            'pda_name' => 'Keluarga'
        ]);
        SelecPragBloodAssis::create([
            'pda_name' => 'Teman'
        ]);
        SelecPragBloodAssis::create([
            'pda_name' => 'Lainnya'
        ]);
    }
}
