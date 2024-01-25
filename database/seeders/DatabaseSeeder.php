<?php

namespace Database\Seeders;

use App\Models\SelecPragPlace;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(BaseurlSeeder::class);
        $this->call(SelecSexSeeder::class);
        $this->call(SelecReligionSeeder::class);
        $this->call(SelecEducaSeeder::class);
        $this->call(SelecBloodSeeder::class);
        $this->call(SelecWorkSeeder::class);
        $this->call(SelecMaritalSeeder::class);
        $this->call(SelecCallSeeder::class);
        $this->call(SelecMonthSeeder::class);
        $this->call(SelecVaksinSeeder::class);
        $this->call(SelecPaySeeder::class);
        $this->call(SelecDesposisiSeeder::class);
        $this->call(SelecKbToolSeeder::class);
        $this->call(SelecUnitSeeder::class);
        $this->call(SelecPMSeeder::class);
        $this->call(SelecPASeeder::class);
        $this->call(SelecDPSeeder::class);
        $this->call(SelecPWSeeder::class);
        $this->call(SelecHabitSeeder::class);
        $this->call(SelecMenCySeeder::class);
        $this->call(SelecPatVisitSeeder::class);
        $this->call(SelecLPCSeeder::class);
        $this->call(SelecTtSeeder::class);
        $this->call(SelecDiseaseSeeder::class);
        // $this->call(SelecIcdSeeder::class);
        $this->call(SelecPragAssisSeeder::class);
        $this->call(SelecPragTransSeeder::class);
        $this->call(SelecPragPlaceSeeder::class);
        $this->call(SelecPragBloodAssisSeeder::class);
        $this->call(SelecPragAssisWithSeeder::class);
        $this->call(SelecStatusPatientSeeder::class);
        $this->call(SelecKbEffectSeeder::class);
        $this->call(SelecKbKompliSeeder::class);
        $this->call(SelecKbFailedSeeder::class);
        $this->call(SelecDjjSeeder::class);
        $this->call(SelecSigSeeder::class);
        $this->call(SelecVaksinServiceSeeder::class);
        $this->call(SelecTypeInstSeeder::class);
        $this->call(SelecComplicatedSeeder::class);
    }
}
