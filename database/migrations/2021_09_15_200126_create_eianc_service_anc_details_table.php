<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_details', function (Blueprint $table) {
            $table->bigIncrements('sancd_id');

            $table->unsignedBigInteger('sancd_anc_id');
            $table->string('sancd_norm', 10)->nullable();
            $table->date('sancd_date');
            $table->string('sancd_type', 2);
            $table->unsignedSmallInteger('sancd_visit')->nullable();
            $table->string('sancd_no', 2);
            $table->unsignedBigInteger('sancd_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_details');
    }
}
