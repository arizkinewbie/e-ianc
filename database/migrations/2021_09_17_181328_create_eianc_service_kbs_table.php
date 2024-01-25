<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceKbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_kbs', function (Blueprint $table) {
            $table->bigIncrements('sanckb_id');

            $table->unsignedBigInteger('sanckb_ins_id');
            $table->string('sanckb_no_reg');
            $table->date('sanckb_date');
            $table->string('sanckb_norm', 10);
            $table->unsignedSmallInteger('sanckb_pay');
            $table->string('sanckb_nifas', 2);

            $table->string('sanckb_life_male', 10);
            $table->string('sanckb_life_female', 10);
            $table->date('sanckb_last_soon');

            $table->date('sanckb_last_mens');
            $table->string('sanckb_just_marr', 2);
            $table->string('sanckb_g', 10);
            $table->string('sanckb_p', 10);
            $table->string('sanckb_a', 10);
            $table->string('sanckb_asi_went', 10);
            $table->string('sanckb_diseases_yellow', 2);
            $table->string('sanckb_diseases_bleeding', 2);
            $table->string('sanckb_diseases_white', 2);
            $table->string('sanckb_diseases_tumor', 2);
            $table->string('sanckb_gen_dis', 2)->nullable();
            $table->string('sanckb_weight', 3)->nullable();
            $table->string('sanckb_blood_press', 10)->nullable();
            $table->string('sanckb_rahim', 2)->nullable();
            $table->string('sanckb_uidmow_radang', 2)->nullable();
            $table->string('sanckb_uidmow_tumor', 2)->nullable();
            $table->string('sanckb_mowmop_diabetes', 2)->nullable();
            $table->string('sanckb_mowmop_blood_froz', 2)->nullable();
            $table->string('sanckb_mowmop_orcepidi', 2)->nullable();
            $table->string('sanckb_mowmop_tumor', 2)->nullable();

            $table->date('sanckb_new_ordered')->nullable();
            $table->date('sanckb_remove')->nullable();

            $table->string('sanckb_allergy')->nullable();
            $table->string('sanckb_allergy_id')->nullable();
            $table->string('sanckb_compli')->nullable();
            $table->string('sanckb_compli_id')->nullable();
            $table->string('sanckb_failed')->nullable();
            $table->string('sanckb_failed_id')->nullable();
            $table->string('sanckb_respon')->nullable();

            $table->unsignedSmallInteger('sanckb_kbt_id')->nullable();
            $table->string('sanckb_use', 2);
            $table->string('sanckb_dosis', 2);
            $table->string('sanckb_last_use')->nullable();

            $table->unsignedBigInteger('sanckb_user_id')->nullable();

            $table->string('sanckb_status', 2);

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
        Schema::dropIfExists('eianc_service_kbs');
    }
}
