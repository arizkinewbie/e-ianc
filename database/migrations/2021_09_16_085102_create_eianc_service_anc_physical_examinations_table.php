<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncPhysicalExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_physical_examinations', function (Blueprint $table) {
            $table->bigIncrements('sancpe_id');

            $table->unsignedBigInteger('sancpe_anc_d_id');
            $table->date('sancpe_date');
            $table->string('sancpe_weight', 5);
            $table->string('sancpe_height', 5);
            $table->string('sancpe_imt', 5);
            $table->string('sancpe_weight_now', 5);
            $table->unsignedSmallInteger('sancpe_tt');

            $table->string('sancpe_nadi', 5);
            $table->string('sancpe_r_rate', 5);
            $table->string('sancpe_tempe', 5);
            $table->string('sancpe_blood_pressure', 10);
            $table->string('sancpe_awareness', 5);

            $table->string('sancpe_body_shape', 5);
            $table->string('sancpe_face', 5);
            $table->string('sancpe_eye', 5);
            $table->string('sancpe_tooth', 5);
            $table->string('sancpe_mouth', 5);
            $table->string('sancpe_arm', 5);
            $table->string('sancpe_pelvis', 5);

            $table->string('sancpe_chest', 5);
            $table->string('sancpe_heart', 5);
            $table->string('sancpe_lungs', 5);
            $table->string('sancpe_patella', 5);
            $table->string('sancpe_boobs', 5);

            $table->string('sancpe_ex_top', 2);
            $table->string('sancpe_ex_bottom', 2);
            $table->string('sancpe_ex_gland', 5);
            $table->string('sancpe_oodena', 2);

            $table->string('sancpe_caesar', 5);
            $table->string('sancpe_fetus', 5);
            $table->string('sancpe_pros_fetus', 5)->nullable();
            $table->string('sancpe_pap', 5)->nullable();
            $table->string('sancpe_tfu_cm', 5)->nullable();
            $table->string('sancpe_tfu_finger', 5)->nullable();
            $table->string('sancpe_tfu_finger_pos', 5)->nullable();
            $table->unsignedSmallInteger('sancpe_djj_id')->nullable();
            $table->string('sancpe_djj', 5)->nullable();
            $table->string('sancpe_djj_desc')->nullable();
            $table->string('sancpe_pl1');
            $table->string('sancpe_pl2');
            $table->string('sancpe_pl3');
            $table->string('sancpe_pl4');

            $table->unsignedBigInteger('sancpe_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_physical_examinations');
    }
}
