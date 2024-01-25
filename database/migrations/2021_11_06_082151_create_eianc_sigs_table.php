<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancSigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_sigs', function (Blueprint $table) {
            $table->bigIncrements('sig_id');

            $table->unsignedBigInteger('sig_ins');
            $table->unsignedSmallInteger('sig_type');
            $table->unsignedBigInteger('sig_nakes');
            $table->unsignedBigInteger('sig_user_id');

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
        Schema::dropIfExists('eianc_sigs');
    }
}
