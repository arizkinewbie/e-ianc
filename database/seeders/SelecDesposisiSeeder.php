<?php

namespace Database\Seeders;

use App\Models\SelecDespoisi;
use Illuminate\Database\Seeder;

class SelecDesposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecDespoisi::create([
            'de_name' => 'Pulang'
        ]);

        SelecDespoisi::create([
            'de_name' => 'Di Rujuk'
        ]);

        SelecDespoisi::create([
            'de_name' => 'Di Rawat'
        ]);
    }
}
