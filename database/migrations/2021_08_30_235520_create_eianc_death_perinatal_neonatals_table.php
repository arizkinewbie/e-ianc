<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancDeathPerinatalNeonatalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_death_perinatal_neonatals', function (Blueprint $table) {
            $table->bigIncrements('det_pn_id');

            $table->string('det_pn_add_kode', 32);
            $table->string('det_pn_month', 32);
            $table->string('det_pn_year', 32);
            $table->string('det_pn_destination', 32);
            $table->string('det_p_bblr', 32);
            $table->string('det_p_asfiksia', 32);
            $table->string('det_p_tetanus_neonatorum', 32);
            $table->string('det_p_sepsis', 32);
            $table->string('det_p_iketrus', 32);
            $table->string('det_p_kel_kongenital', 32);
            $table->string('det_p_other', 32);
            $table->string('det_n_bblr', 32);
            $table->string('det_n_asfiksia', 32);
            $table->string('det_n_tetanus_neonatorum', 32);
            $table->string('det_n_sepsis', 32);
            $table->string('det_n_iketrus', 32);
            $table->string('det_n_kel_kongenital', 32);
            $table->string('det_n_other', 32);
            $table->unsignedBigInteger('det_pn_user_id')->nullable();

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
        Schema::dropIfExists('eianc_death_perinatal_neonatals');
    }
}
