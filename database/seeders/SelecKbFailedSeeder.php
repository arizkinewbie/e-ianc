<?php

namespace Database\Seeders;

use App\Models\SelecKbFailed;
use Illuminate\Database\Seeder;

class SelecKbFailedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecKbFailed::create([
            'kbf_name' => 'Terjadinya kehamilan pada PUS yang sedang memakai alat kontrasepsi'
        ]);
    }
}
