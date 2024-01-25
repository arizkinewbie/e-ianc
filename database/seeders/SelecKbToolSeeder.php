<?php

namespace Database\Seeders;

use App\Models\SelecKbTool;
use Illuminate\Database\Seeder;

class SelecKbToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecKbTool::create([
            'kbt_name' => 'Belum Pernah'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Pil KB'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Kondom Pria'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Kondom Wanita'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Suntik KB'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Implan'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'IUD'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Spermisida'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Diafragma'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Cervical cap'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Koyo ortho evra'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Cincin vagina'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'KB permanen'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'MOW'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'MOP'
        ]);

        SelecKbTool::create([
            'kbt_name' => 'Obat Vaginal'
        ]);
    }
}
