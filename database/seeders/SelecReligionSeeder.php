<?php

namespace Database\Seeders;

use App\Models\SelecReligion;
use Illuminate\Database\Seeder;

class SelecReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecReligion::create([
            'rel_name' => 'Islam'
        ]);
        SelecReligion::create([
            'rel_name' => 'Kristen'
        ]);
        SelecReligion::create([
            'rel_name' => 'Khatolik'
        ]);
        SelecReligion::create([
            'rel_name' => 'Hindu'
        ]);
        SelecReligion::create([
            'rel_name' => 'Konghucu'
        ]);
        SelecReligion::create([
            'rel_name' => 'Pengganut Kepercayaan'
        ]);
    }
}
