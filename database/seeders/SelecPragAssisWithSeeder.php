<?php

namespace Database\Seeders;

use App\Models\SelecPragAssisWith;
use Illuminate\Database\Seeder;

class SelecPragAssisWithSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPragAssisWith::create([
            'paw_name' => 'Tidak ada'
        ]);
        SelecPragAssisWith::create([
            'paw_name' => 'Suami'
        ]);
        SelecPragAssisWith::create([
            'paw_name' => 'Keluarga'
        ]);
        SelecPragAssisWith::create([
            'paw_name' => 'Teman'
        ]);
        SelecPragAssisWith::create([
            'paw_name' => 'Tetangga'
        ]);
        SelecPragAssisWith::create([
            'paw_name' => 'Lainnya'
        ]);
    }
}
