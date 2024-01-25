<?php

namespace Database\Seeders;

use App\Models\SelecMarital;
use Illuminate\Database\Seeder;

class SelecMaritalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecMarital::create([
            'mar_name' => 'Belum Kawin'
        ]);
        SelecMarital::create([
            'mar_name' => 'Kawin'
        ]);
        SelecMarital::create([
            'mar_name' => 'Cerai Hidup'
        ]);
        SelecMarital::create([
            'mar_name' => 'Cerai Mati'
        ]);
    }
}
