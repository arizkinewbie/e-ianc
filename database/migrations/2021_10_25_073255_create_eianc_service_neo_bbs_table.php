<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceNeoBbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_neo_bbs', function (Blueprint $table) {
            $table->bigIncrements('neobb_id');

            $table->string('neobb_norm');
            $table->string('neobb_ins_id');
            $table->string('neobb_no_reg');
            $table->date('neobb_date');
            $table->string('neobb_type', 5);

            $table->string('neobb_y');
            $table->string('neobb_m');
            $table->string('neobb_d');

            $table->string('neobb_insp_asi')->nullable();
            $table->string('neobb_insp_mp_asi')->nullable();
            $table->string('neobb_insp_sdi_dtk')->nullable();

            $table->string('neobb_nut_weight')->nullable();
            $table->string('neobb_nut_height')->nullable();
            $table->string('neobb_nut_status')->nullable();
            $table->string('neobb_nut_vit')->nullable();

            $table->string('neobb_prog_semiologi_hiv')->nullable();
            $table->string('neobb_prog_cd4')->nullable();
            $table->string('neobb_prog_kelambu')->nullable();

            $table->string('neobb_vacc')->nullable();

            $table->string('neobb_det')->nullable();
            $table->unsignedBigInteger('neobb_user_id');

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
        Schema::dropIfExists('eianc_service_neo_bbs');
    }
}
