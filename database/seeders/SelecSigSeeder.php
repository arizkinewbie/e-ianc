<?php

namespace Database\Seeders;

use App\Models\SelecSig;
use Illuminate\Database\Seeder;

class SelecSigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecSig::create([
            'ssig_name' => 'Kepala Puskesmas/PMB'
        ]);
        SelecSig::create([
            'ssig_name' => 'Pengelola KB'
        ]);
        SelecSig::create([
            'ssig_name' => 'Pengelola KIA'
        ]);
        SelecSig::create([
            'ssig_name' => 'Pengelola Kulkas/Lemari Pendingin'
        ]);
    }
}
