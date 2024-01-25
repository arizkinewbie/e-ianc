<?php

namespace Database\Seeders;

use App\Models\SysBaseurl;
use Illuminate\Database\Seeder;

class BaseurlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SysBaseurl::create([
            'url_use' => 'root',
            'url_address' => 'http://localhost:8000',
            'url_status' => '1'
        ]);
    }
}
