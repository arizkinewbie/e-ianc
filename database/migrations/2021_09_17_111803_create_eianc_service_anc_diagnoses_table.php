<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_diagnoses', function (Blueprint $table) {
            $table->bigIncrements('sancdi_id');

            $table->unsignedBigInteger('sancdi_anc_d_id');
            $table->string('sancdi_gpa', 10);
            $table->string('sancdi_uk', 32);
            $table->unsignedSmallInteger('sancdi_disease_id');
            $table->string('sancdi_tcompli')->nullable();
            $table->string('sancdi_compli')->nullable();
            $table->string('sancdi_sugg')->nullable();
            $table->text('sancdi_diag_marr');
            $table->unsignedBigInteger('sancdi_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_diagnoses');
    }
}
