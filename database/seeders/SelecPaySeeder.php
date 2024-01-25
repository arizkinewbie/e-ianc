<?php

namespace Database\Seeders;

use App\Models\SelecPay;
use Illuminate\Database\Seeder;

class SelecPaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelecPay::create([
            'pay_code' => '001',
            'pay_name' => 'Umum/Mandiri'
        ]);

        SelecPay::create([
            'pay_code' => '002',
            'pay_name' => 'BPJS Kesehatan'
        ]);
    }
}
