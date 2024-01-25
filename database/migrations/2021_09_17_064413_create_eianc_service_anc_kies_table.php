<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncKiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_kies', function (Blueprint $table) {
            $table->bigIncrements('sanckie_id');

            $table->unsignedBigInteger('sanckie_anc_d_id');
            $table->string('sanckie_mat_ass');
            $table->string('sanckie_trans');
            $table->string('sanckie_sup_fe', 5);
            $table->string('sanckie_food_cal_fe', 5);
            $table->string('sanckie_phbs', 5);
            $table->string('sanckie_mat_place');
            $table->string('sanckie_blood_bank');
            $table->string('sanckie_pmt', 5);
            $table->string('sanckie_dan_hm', 5);
            $table->string('sanckie_def_hiv', 5);
            $table->string('sanckie_assis');
            $table->string('sanckie_kia_book', 5);
            $table->string('sanckie_yodium', 5);
            $table->string('sanckie_fis_hm', 5);
            $table->string('sanckie_motiv_kdrt', 5);

            $table->string('sanckie_tt', 5);
            $table->string('sanckie_tt_no', 5)->nullable();
            $table->string('sanckie_preg_exer', 5);
            $table->string('sanckie_ht_2', 5);
            $table->string('sanckie_com_fetus', 5);
            $table->string('sanckie_preg_class', 5);
            $table->string('sanckie_music', 5);

            $table->string('sanckie_imd', 5);
            $table->string('sanckie_kolostrum', 5);
            $table->string('sanckie_asi_6', 5);
            $table->string('sanckie_asi_comp', 5);
            $table->string('sanckie_asi_give', 5);
            $table->string('sanckie_asi_went', 5);
            $table->string('sanckie_boob_treatment', 5);
            $table->string('sanckie_ht3', 5);
            $table->string('sanckie_preg_iden', 5);
            $table->string('sanckie_dan_nifas', 5);
            $table->string('sanckie_fm', 5);
            $table->string('sanckie_kb_nifas', 5);

            $table->unsignedBigInteger('sanckie_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_kies');
    }
}
