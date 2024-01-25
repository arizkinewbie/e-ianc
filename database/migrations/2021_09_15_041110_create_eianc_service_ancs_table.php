<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_ancs', function (Blueprint $table) {
            $table->bigIncrements('sanc_id');

            $table->string('sanc_norm', 10);
            $table->string('sanc_gravida', 2);
            $table->string('sanc_aborsi', 2)->nullable();
            $table->string('sanc_partus', 2)->nullable();
            $table->string('sanc_life', 2)->nullable();
            $table->string('sanc_death', 2)->nullable();

            $table->date('sanc_hpht')->nullable();
            $table->date('sanc_hpl')->nullable();

            $table->unsignedSmallInteger('sanc_pregnancy1_marriage')->nullable();
            $table->unsignedSmallInteger('sanc_pregnancy1_age')->nullable();
            $table->unsignedSmallInteger('sanc_distance_pregnancy')->nullable();
            $table->string('sanc_pregnancy_failed', 2)->nullable();
            $table->unsignedSmallInteger('sanc_born_with')->nullable();
            $table->string('sanc_kia', 2)->nullable();
            $table->unsignedSmallInteger('sanc_habit')->nullable();

            $table->string('sanc_illness_experienced')->nullable();
            $table->string('sanc_hereditary_disease')->nullable();
            $table->string('sanc_menstrual', 2)->nullable();
            $table->unsignedSmallInteger('sanc_menstrual_cycle')->nullable();
            $table->string('sanc_hiv_aids', 2)->nullable();
            $table->unsignedBigInteger('sanc_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_ancs');
    }
}
