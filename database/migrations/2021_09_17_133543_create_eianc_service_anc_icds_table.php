<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncIcdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_icds', function (Blueprint $table) {
            $table->bigIncrements('sancicd_id');

            $table->unsignedBigInteger('sancicd_anc_d_id');
            $table->unsignedBigInteger('sancicd_icd');
            $table->unsignedBigInteger('sancicd_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_icds');
    }
}
