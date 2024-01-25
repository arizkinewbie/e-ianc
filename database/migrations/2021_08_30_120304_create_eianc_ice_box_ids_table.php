<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancIceBoxIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_ice_box_ids', function (Blueprint $table) {
            $table->bigIncrements('ibi_id');

            $table->unsignedBigInteger('ibi_ins_id');
            $table->string('ibi_brand');
            $table->string('ibi_series');
            $table->string('ibi_source');
            $table->string('ibi_source_year', 10);
            $table->unsignedBigInteger('ibi_user_id')->nullable();

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
        Schema::dropIfExists('eianc_ice_box_ids');
    }
}
