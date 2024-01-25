<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_drugs', function (Blueprint $table) {
            $table->bigIncrements('dg_id');

            $table->unsignedBigInteger('dg_ins_id');
            $table->unsignedSmallInteger('dg_type')->nullable();
            $table->string('dg_code')->nullable();
            $table->string('dg_brand');
            $table->string('dg_batch')->nullable();
            $table->string('dg_netto', 10);
            $table->string('dg_unit', 32);
            $table->date('dg_received_date');
            $table->date('dg_expired_date');
            $table->string('dg_remainder', 10);
            $table->string('dg_price', 10);
            $table->string('dg_sell', 10);
            $table->unsignedBigInteger('dg_user_id')->nullable();

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
        Schema::dropIfExists('eianc_drugs');
    }
}
