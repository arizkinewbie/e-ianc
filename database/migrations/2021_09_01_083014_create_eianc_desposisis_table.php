<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancDesposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_desposisis', function (Blueprint $table) {
            $table->bigIncrements('des_id');

            $table->string('des_reg_no');
            $table->string('des_norm');
            $table->unsignedBigInteger('des_ins_id');
            $table->unsignedSmallInteger('des_de_id');
            $table->string('des_des_unit')->nullable();
            $table->string('des_des_ins')->nullable();
            $table->string('des_diagnose')->nullable();
            $table->string('des_first_aid')->nullable();
            $table->unsignedBigInteger('des_user_id')->nullable();

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
        Schema::dropIfExists('eianc_desposisis');
    }
}
