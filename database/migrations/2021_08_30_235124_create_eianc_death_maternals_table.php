<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancDeathMaternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_death_maternals', function (Blueprint $table) {
            $table->bigIncrements('detm_id');

            $table->string('detm_add_kode', 32);
            $table->string('detm_month', 4);
            $table->string('detm_year', 4);
            $table->string('detm_destination', 32);
            $table->string('detm_pendarahan', 32);
            $table->string('detm_eklamsi', 32);
            $table->string('detm_infeksi', 32);
            $table->string('detm_abortus', 32);
            $table->string('detm_partus_lama', 32);
            $table->string('detm_trauma_obsetrik', 32);
            $table->string('detm_komplikasi_puerperium', 32);
            $table->string('detm_other', 32);
            $table->unsignedBigInteger('detm_user_id')->nullable();

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
        Schema::dropIfExists('eianc_death_maternals');
    }
}
