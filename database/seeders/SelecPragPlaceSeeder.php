<?php

namespace Database\Seeders;

use App\Models\SelecPragPlace;
use Illuminate\Database\Seeder;

class SelecPragPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPragPlace::create([
            'pl_name' => 'RSIA'
        ]);
        SelecPragPlace::create([
            'pl_name' => 'RS'
        ]);
        SelecPragPlace::create([
            'pl_name' => 'RS ODHA'
        ]);
        SelecPragPlace::create([
            'pl_name' => 'Puskesmas'
        ]);
        SelecPragPlace::create([
            'pl_name' => 'PMB'
        ]);
    }
}
