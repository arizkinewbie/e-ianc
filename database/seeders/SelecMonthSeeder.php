<?php

namespace Database\Seeders;

use App\Models\SelecMonth;
use Illuminate\Database\Seeder;

class SelecMonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecMonth::create([
            'mon_name' => 'Januari'
        ]);

        SelecMonth::create([
            'mon_name' => 'Februari'
        ]);

        SelecMonth::create([
            'mon_name' => 'Maret'
        ]);

        SelecMonth::create([
            'mon_name' => 'April'
        ]);

        SelecMonth::create([
            'mon_name' => 'Mei'
        ]);

        SelecMonth::create([
            'mon_name' => 'Juni'
        ]);

        SelecMonth::create([
            'mon_name' => 'Juli'
        ]);

        SelecMonth::create([
            'mon_name' => 'Agustus'
        ]);

        SelecMonth::create([
            'mon_name' => 'September'
        ]);

        SelecMonth::create([
            'mon_name' => 'Oktober'
        ]);

        SelecMonth::create([
            'mon_name' => 'November'
        ]);

        SelecMonth::create([
            'mon_name' => 'Desember'
        ]);
    }
}
