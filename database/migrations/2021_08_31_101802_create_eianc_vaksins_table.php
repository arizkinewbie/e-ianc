<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancVaksinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_vaksins', function (Blueprint $table) {
            $table->bigIncrements('vak_id');

            $table->unsignedBigInteger('vak_ins_id');
            $table->unsignedBigInteger('vak_ib_id');
            $table->unsignedSmallInteger('vak_type');
            $table->string('vak_brand');
            $table->string('vak_batch');
            $table->date('vak_received_date');
            $table->date('vak_expired_date');
            $table->string('vak_netto', 10)->nullable();
            $table->string('vak_unit', 10)->nullable();
            $table->string('vak_remainder', 10)->nullable();
            $table->unsignedBigInteger('vak_user_id')->nullable();

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
        Schema::dropIfExists('eianc_vaksins');
    }
}
