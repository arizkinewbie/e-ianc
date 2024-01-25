<?php

namespace Database\Seeders;

use App\Models\SelecIcd;
use Illuminate\Database\Seeder;

class SelecIcdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecIcd::create([
            'icd_code' => 'A 01',
            'icd_name' => 'Demam tifoid dan paratifoid'
        ]);

        SelecIcd::create([
            'icd_code' => 'A 06.0-3.5-9',
            'icd_name' => 'Amebiasis lainnya'
        ]);

        SelecIcd::create([
            'icd_code' => 'A 00',
            'icd_name' => 'Kolera'
        ]);

        SelecIcd::create([
            'icd_code' => 'A 01',
            'icd_name' => 'Demam tifoid dan paratifoid'
        ]);

        SelecIcd::create([
            'icd_code' => 'Z 00.1',
            'icd_name' => 'Pemeriksaan kesehatan bayi dan anak secara rutin'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 00.0',
            'icd_name' => 'Abdominal pregnancy'
        ]);

        SelecIcd::create([
            'icd_code' => 'F 53.0',
            'icd_name' => 'Mild mental and behavioural disorders associated with the puerperium, not elsewhere classified'
        ]);

        SelecIcd::create([
            'icd_code' => 'F 53.1',
            'icd_name' => 'Severe mental and behavioural disorders associated with the puerperium, not elsewhere classified'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 21.2',
            'icd_name' => 'Late vomiting of pregnancy'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 00.9',
            'icd_name' => 'Ectopic pregnancy, unspecified'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 1.9',
            'icd_name' => 'Vomiting of pregnancy, unspecified'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 21.8',
            'icd_name' => 'Other vomiting complicating pregnancy'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 80.9',
            'icd_name' => 'Single spontaneous delivery, unspecified'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 15.0',
            'icd_name' => 'Eclampsia in pregnancy'
        ]);

        SelecIcd::create([
            'icd_code' => 'Z 32.1',
            'icd_name' => 'Pregnancy confirmed'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 26.9',
            'icd_name' => 'Pregnancy-related condition, unspecified'
        ]);

        SelecIcd::create([
            'icd_code' => 'F 53.0',
            'icd_name' => 'Mild mental and behavioural disorders associated with the puerperium, not elsewhere classified'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 00.8',
            'icd_name' => 'Other ectopic pregnancy'
        ]);

        SelecIcd::create([
            'icd_code' => 'Z 34.0',
            'icd_name' => 'Supervision of normal first pregnancy'
        ]);

        SelecIcd::create([
            'icd_code' => 'O 00.1',
            'icd_name' => 'Tubal pregnancy'
        ]);

        SelecIcd::create([
            'icd_code' => 'Z 34.8',
            'icd_name' => 'Supervision of other normal pregnancy'
        ]);
    }
}
