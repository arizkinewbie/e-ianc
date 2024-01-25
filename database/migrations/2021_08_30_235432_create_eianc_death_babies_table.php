<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancDeathBabiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_death_babies', function (Blueprint $table) {
            $table->bigIncrements('detb_id');

            $table->string('detb_add_kode', 32);
            $table->string('detb_month', 4);
            $table->string('detb_year', 4);
            $table->string('detb_destination', 32);
            $table->string('detb_by_pneunomia', 32);
            $table->string('detb_by_diare', 32);
            $table->string('detb_by_tetanus_neonatorum', 32);
            $table->string('detb_by_kel_sal_cerna', 32);
            $table->string('detb_by_kelainan_saraf', 32);
            $table->string('detb_by_kelainan_kongenital', 32);
            $table->string('detb_by_other', 32);
            $table->string('detb_bl_ispa', 32);
            $table->string('detb_bl_diare', 32);
            $table->string('detb_bl_malaria', 32);
            $table->string('detb_bl_dbd', 32);
            $table->string('detb_bl_typus', 32);
            $table->string('detb_bl_kel_sal_cerna', 32);
            $table->string('detb_bl_other', 32);
            $table->unsignedBigInteger('detb_user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eianc_death_babies');
    }
}
