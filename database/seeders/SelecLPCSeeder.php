<?php

namespace Database\Seeders;

use App\Models\SelecLPC;
use Illuminate\Database\Seeder;

class SelecLPCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecLPC::create([
            'lpc_name' => 'Belum Pernah'
        ]);
        SelecLPC::create([
            'lpc_name' => 'PMB'
        ]);
        SelecLPC::create([
            'lpc_name' => 'Puskesmas'
        ]);
        SelecLPC::create([
            'lpc_name' => 'Pustus'
        ]);
        SelecLPC::create([
            'lpc_name' => 'Posyandu'
        ]);
        SelecLPC::create([
            'lpc_name' => 'Polindes'
        ]);
        SelecLPC::create([
            'lpc_name' => 'Ponkesdes'
        ]);
        SelecLPC::create([
            'lpc_name' => 'Dokter Praktik'
        ]);
        SelecLPC::create([
            'lpc_name' => 'RSB'
        ]);
        SelecLPC::create([
            'lpc_name' => 'RS'
        ]);
    }
}
