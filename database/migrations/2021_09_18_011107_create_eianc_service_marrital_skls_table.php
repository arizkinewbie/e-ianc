<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceMarritalSklsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_marrital_skls', function (Blueprint $table) {
            $table->bigIncrements('sancmskl_id');

            $table->unsignedBigInteger('sancmskl_marr_id');
            $table->string('sancmskl_no_reg');
            $table->string('sancmskl_name');
            $table->unsignedSmallInteger('sancmskl_sex');
            $table->date('sancmskl_date');
            $table->time('sancmskl_time');
            $table->string('sancmskl_cond', 2);
            $table->string('sancmskl_cond_baby', 2);
            $table->string('sancmskl_weight', 10);
            $table->string('sancmskl_height', 10);
            $table->string('sancmskl_icd1')->nullable();
            $table->string('sancmskl_icd2')->nullable();
            $table->string('sancmskl_icd3')->nullable();
            $table->string('sancmskl_icd4')->nullable();

            $table->unsignedBigInteger('sancmskl_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_marrital_skls');
    }
}
