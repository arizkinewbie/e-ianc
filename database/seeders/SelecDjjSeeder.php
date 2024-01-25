<?php

namespace Database\Seeders;

use App\Models\SelecDjj;
use Illuminate\Database\Seeder;

class SelecDjjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecDjj::create([
            'djj_name' => '120 - 160'
        ]);
        SelecDjj::create([
            'djj_name' => '< 120 atau > 160'
        ]);
        SelecDjj::create([
            'djj_name' => '0'
        ]);
    }
}
