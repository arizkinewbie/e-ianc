<?php

namespace Database\Seeders;

use App\Models\SelecSex;
use Illuminate\Database\Seeder;

class SelecSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecSex::create([
            'sex_name' => 'Laki-laki'
        ]);

        SelecSex::create([
            'sex_name' => 'Perempuan'
        ]);
    }
}
