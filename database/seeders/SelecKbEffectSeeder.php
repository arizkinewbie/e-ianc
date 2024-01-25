<?php

namespace Database\Seeders;

use App\Models\SelecKbEffect;
use Illuminate\Database\Seeder;

class SelecKbEffectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecKbEffect::create([
            'kbe_name' => 'Pusing/Sakit kepala'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Mual/Muntah'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Perubahan Tekanan Darah'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Akne/Chioasma/Alergi'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Perubahan Berat Badan'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Gangguan haid keputihan/Vaginitis/Erasi'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Expulsi'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Spoting'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Anemia'
        ]);
        SelecKbEffect::create([
            'kbe_name' => 'Keluhan Fisik'
        ]);
    }
}
