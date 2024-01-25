<?php

namespace Database\Seeders;

use App\Models\SelecKbKompli;
use Illuminate\Database\Seeder;

class SelecKbKompliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecKbKompli::create([
            'kbk_name' => 'Ekspuisi/Migrasi'
        ]);
        SelecKbKompli::create([
            'kbk_name' => 'Kapsul pembengkakan infeksi/Abses'
        ]);
        SelecKbKompli::create([
            'kbk_name' => 'Hemaloma'
        ]);
        SelecKbKompli::create([
            'kbk_name' => 'Pendarahan yang perlu perawatan'
        ]);
        SelecKbKompli::create([
            'kbk_name' => 'Perforasi'
        ]);
        SelecKbKompli::create([
            'kbk_name' => 'Melukai organ lain'
        ]);
        SelecKbKompli::create([
            'kbk_name' => 'granuloma sperma'
        ]);
    }
}
