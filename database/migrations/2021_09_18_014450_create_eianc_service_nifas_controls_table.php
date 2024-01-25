<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceNifasControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_nifas_controls', function (Blueprint $table) {
            $table->bigIncrements('sancnc_id');

            $table->string('sancnc_anc_d_id');
            $table->string('sancnc_no_reg');
            $table->date('sancnc_date');

            $table->string('sancnc_type', 2);
            $table->string('sancnc_kasus', 2);
            $table->string('sancnc_keluhan', 255);
            $table->string('sancnc_diagnosis', 255);
            $table->string('sancnc_visit', 2);
            $table->string('sancnc_tindakan', 255);

            $table->unsignedBigInteger('sancnc_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_nifas_controls');
    }
}
