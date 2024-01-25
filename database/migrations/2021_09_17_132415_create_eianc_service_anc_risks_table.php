<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_risks', function (Blueprint $table) {
            $table->bigIncrements('sancr_id');

            $table->unsignedBigInteger('sancr_anc_d_id');
            $table->string('sancr_no_reg');
            $table->string('sancr_awal', 11);
            $table->string('sancr_ter_muda', 11);
            $table->string('sancr_ter_tua', 11);
            $table->string('sancr_ter_lam_h1', 11);
            $table->string('sancr_ter_tua_h1', 11);
            $table->string('sancr_ter_cep_ham', 11);
            $table->string('sancr_ter_lam_ham', 11);
            $table->string('sancr_ter_pen', 11);
            $table->string('sancr_ter_ban_anak', 11);
            $table->string('sancr_per_gag_ham', 11);
            $table->string('sancr_per_lahir', 11);
            $table->string('sancr_per_caesar', 11);
            $table->string('sancr_pen_ham', 11);
            $table->string('sancr_beng_mkmt', 11);
            $table->string('sancr_td_ting', 11);
            $table->string('sancr_ham_kembar', 11);
            $table->string('sancr_ham_kembang', 11);
            $table->string('sancr_bay_mati', 11);
            $table->string('sancr_ham_leb_bulan', 11);
            $table->string('sancr_let_sungsang', 11);
            $table->string('sancr_let_lintang', 11);
            $table->string('sancr_perdar_ham', 11);
            $table->string('sancr_per_eks', 11);
            $table->string('sancr_score', 11);

            $table->unsignedBigInteger('sancr_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_risks');
    }
}
