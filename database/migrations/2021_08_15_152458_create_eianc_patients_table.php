<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_patients', function (Blueprint $table) {
            $table->bigIncrements('pat_id');

            $table->string('pat_norm', 8);
            $table->string('pat_bpjs_kesehatan', 13)->nullable();
            $table->string('pat_nik', 16)->nullable();
            $table->unsignedInteger('pat_status');
            $table->unsignedInteger('pat_called');
            $table->string('pat_name');
            $table->unsignedInteger('pat_sex');
            $table->unsignedInteger('pat_religion');
            $table->string('pat_pob');
            $table->date('pat_dob');
            $table->time('pat_tob');
            $table->string('pat_age', 10);
            $table->string('pat_year', 10);
            $table->string('pat_month', 10);
            $table->string('pat_day', 10);
            $table->unsignedInteger('pat_education');
            $table->unsignedInteger('pat_blood')->nullable();
            $table->unsignedInteger('pat_work');
            $table->unsignedInteger('pat_marital');
            $table->string('pat_address');
            $table->string('pat_rt', 5);
            $table->string('pat_rw', 5);
            $table->string('pat_village', 32);
            $table->string('pat_subdistrict', 32);
            $table->string('pat_district', 32);
            $table->string('pat_province', 32);
            $table->string('pat_zip_code', 32)->nullable();
            $table->string('pat_telp', 16)->nullable();
            $table->string('pat_biological_mother');
            $table->string('pat_thumb')->default('none.png');

            $table->string('pat_husband')->nullable();
            $table->unsignedInteger('pat_husband_work')->nullable();
            $table->string('pat_husband_nik', 16)->nullable();
            $table->string('pat_wife')->nullable();
            $table->unsignedInteger('pat_wife_work')->nullable();
            $table->string('pat_wife_nik', 16)->nullable();

            $table->string('pat_mother')->nullable();
            $table->unsignedInteger('pat_mother_work')->nullable();
            $table->string('pat_mother_nik', 16)->nullable();
            $table->string('pat_father')->nullable();
            $table->unsignedInteger('pat_father_work')->nullable();
            $table->string('pat_father_nik', 16)->nullable();

            $table->string('pat_last_visit', 32);
            $table->unsignedBigInteger('pat_ins');
            $table->unsignedBigInteger('pat_user_id');

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
        Schema::dropIfExists('eianc_patients');
    }
}
