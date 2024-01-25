<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceMarritalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_marritals', function (Blueprint $table) {
            $table->bigIncrements('sancm_id');

            $table->unsignedBigInteger('sancm_anc_d_id');
            $table->string('sancm_no_reg');
            $table->string('sancm_norm', 10);
            $table->date('sancm_date');
            $table->time('sancm_time');
            $table->unsignedSmallInteger('sancm_met_marr');
            $table->string('sancm_kembar', 2);

            $table->unsignedBigInteger('sancm_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_marritals');
    }
}
