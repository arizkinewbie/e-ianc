<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceNeo28sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_neo28s', function (Blueprint $table) {
            $table->bigIncrements('neo28_id');

            $table->string('neo28_norm');
            $table->string('neo28_ins_id');
            $table->string('neo28_no_reg');
            $table->date('neo28_date');
            $table->string('neo28_type');
            $table->string('neo28_visit');

            $table->string('neo28_weigth', 10);
            $table->string('neo28_height', 10);
            $table->string('neo28_temp', 10);
            $table->string('neo28_freq_breath', 10);
            $table->string('neo28_freq_heart', 10);
            $table->string('neo28_infec')->nullable();
            $table->string('neo28_iketrus')->nullable();
            $table->string('neo28_diare')->nullable();
            $table->string('neo28_asi')->nullable();
            $table->string('neo28_vit')->nullable();
            $table->string('neo28_vacc')->nullable();
            $table->string('neo28_shk')->nullable();
            $table->string('neo28_shk_tes')->nullable();
            $table->string('neo28_shk_confrim')->nullable();
            $table->string('neo28_shk_treatment')->nullable();
            $table->unsignedBigInteger('neo28_user_id');

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
        Schema::dropIfExists('eianc_service_neo28s');
    }
}
