<?php

namespace Database\Seeders;

use App\Models\SelecEduca;
use Illuminate\Database\Seeder;

class SelecEducaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecEduca::create([
            'edu_name' => 'Belum Sekolah'
        ]);

        SelecEduca::create([
            'edu_name' => 'TK/KB/PAUD/BIMBA'
        ]);

        SelecEduca::create([
            'edu_name' => 'SD/Sederajat'
        ]);

        SelecEduca::create([
            'edu_name' => 'SMP/Sederajat'
        ]);

        SelecEduca::create([
            'edu_name' => 'SMA/SMK/Sederajar'
        ]);

        SelecEduca::create([
            'edu_name' => 'Diploma 1'
        ]);

        SelecEduca::create([
            'edu_name' => 'Diploma 3'
        ]);

        SelecEduca::create([
            'edu_name' => 'Diploma 4'
        ]);

        SelecEduca::create([
            'edu_name' => 'Strata 1'
        ]);

        SelecEduca::create([
            'edu_name' => 'Strata 2'
        ]);

        SelecEduca::create([
            'edu_name' => 'Strata 3'
        ]);
    }
}
