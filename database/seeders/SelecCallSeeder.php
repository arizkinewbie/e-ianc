<?php

namespace Database\Seeders;

use App\Models\SelecCall;
use Illuminate\Database\Seeder;

class SelecCallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecCall::create([
            'cal_name' => 'By.'
        ]);

        SelecCall::create([
            'cal_name' => 'An.'
        ]);

        SelecCall::create([
            'cal_name' => 'Nn.'
        ]);

        SelecCall::create([
            'cal_name' => 'Ny.'
        ]);

        SelecCall::create([
            'cal_name' => 'Sdri.'
        ]);
    }
}
