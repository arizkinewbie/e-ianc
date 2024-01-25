<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceBabiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_babies', function (Blueprint $table) {
            $table->bigIncrements('sbaby_id');

            $table->unsignedBigInteger('sbaby_ins_id');
            $table->string('sbaby_norm', 10)->nullable();
            $table->string('sbaby_no_reg');
            $table->string('sbaby_no', 2);
            $table->string('sbaby_weight_born', 10);
            $table->string('sbaby_height_born', 10);
            $table->string('sbaby_cond', 10);
            $table->string('sbaby_mat_assis');
            $table->unsignedSmallInteger('sbaby_pragwith_id');
            $table->string('sbaby_asi', 2);
            $table->string('sbaby_asi_give', 2)->nullable();
            $table->string('sbaby_age')->nullable();
            $table->string('sbaby_weight_now', 10);
            $table->string('sbaby_height_now', 10);
            $table->string('sbaby_sym')->nullable();
            $table->string('sbaby_physical')->nullable();
            $table->string('sbaby_diagnose')->nullable();
            $table->unsignedBigInteger('sbaby_drug_id')->nullable();
            $table->string('sbaby_dosis')->nullable();
            $table->string('sbaby_sugg')->nullable();

            $table->unsignedBigInteger('sbaby_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_babies');
    }
}
