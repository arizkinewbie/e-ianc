<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_treatments', function (Blueprint $table) {
            $table->bigIncrements('sanct_id');

            $table->unsignedBigInteger('sanct_anc_d_id');
            $table->unsignedSmallInteger('sanct_tt');
            $table->date('sanct_tt_date')->nullable();
            $table->string('sanct_arsip_kia', 5);
            $table->string('sanct_kelambu', 5);

            $table->unsignedBigInteger('sanct_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_treatments');
    }
}
