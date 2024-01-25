<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceNifasObsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_nifas_obsers', function (Blueprint $table) {
            $table->bigIncrements('sancno_id');

            $table->unsignedBigInteger('sancno_anc_d_id');
            $table->string('sancno_no_reg');
            $table->date('sancno_date');
            $table->string('sancno_day', 2);
            $table->string('sancno_time', 2);

            $table->string('sancno_type', 2);
            $table->string('sancno_tensi', 10);
            $table->string('sancno_nadi', 10);
            $table->string('sancno_suhu', 10);
            $table->string('sancno_cond');
            $table->string('sancno_laktasi');
            $table->string('sancno_perut');
            $table->string('sancno_fun_uteri');
            $table->string('sancno_kontraksi');
            $table->string('sancno_perineum');
            $table->string('sancno_lochea');
            $table->string('sancno_flatus');
            $table->string('sancno_miksi');
            $table->string('sancno_defiksi');
            $table->string('sancno_other')->nullable();

            $table->unsignedBigInteger('sancno_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_nifas_obsers');
    }
}
