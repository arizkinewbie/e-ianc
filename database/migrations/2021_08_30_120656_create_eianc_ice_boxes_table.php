<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancIceBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_ice_boxes', function (Blueprint $table) {
            $table->bigIncrements('ib_id');

            $table->unsignedBigInteger('ib_ins_id');
            $table->unsignedBigInteger('ib_ibi_id');
            $table->date('ib_date');
            $table->string('ib_morning', 3);
            $table->string('ib_afternoon', 3);
            $table->unsignedBigInteger('ib_user_id')->nullable();

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
        Schema::dropIfExists('eianc_ice_boxes');
    }
}
