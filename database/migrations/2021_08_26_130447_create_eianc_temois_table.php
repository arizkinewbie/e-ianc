<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancTemoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_temois', function (Blueprint $table) {
            $table->bigIncrements('temoi_id');

            $table->unsignedBigInteger('temoi_ins_id');
            $table->unsignedBigInteger('temoi_nakes_id');
            $table->unsignedBigInteger('temoi_user_id')->nullable();
            $table->enum('temoi_status', ['0', '1', '2'])->default('0');

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
        Schema::dropIfExists('eianc_temois');
    }
}
