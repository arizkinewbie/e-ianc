<?php

namespace Database\Seeders;

use App\Models\SelecPragTrans;
use Illuminate\Database\Seeder;

class SelecPragTransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPragTrans::create([
            'pt_name' => 'Motor'
        ]);
        SelecPragTrans::create([
            'pt_name' => 'Becak'
        ]);
        SelecPragTrans::create([
            'pt_name' => 'Taksi'
        ]);
        SelecPragTrans::create([
            'pt_name' => 'Mobil Pribadi'
        ]);
        SelecPragTrans::create([
            'pt_name' => 'Angkutan Umum'
        ]);
    }
}
