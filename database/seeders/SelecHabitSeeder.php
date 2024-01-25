<?php

namespace Database\Seeders;

use App\Models\SelecHabit;
use Illuminate\Database\Seeder;

class SelecHabitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecHabit::create([
            'hb_name' => 'Tidak Ada'
        ]);
        SelecHabit::create([
            'hb_name' => 'Merokok'
        ]);
        SelecHabit::create([
            'hb_name' => 'Minumanan Keras / Alkohol'
        ]);
        SelecHabit::create([
            'hb_name' => 'Narkotika'
        ]);
        SelecHabit::create([
            'hb_name' => 'Minum Jamu'
        ]);
        SelecHabit::create([
            'hb_name' => 'Pijat Urat'
        ]);
    }
}
