<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancDataSasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_data_sasarans', function (Blueprint $table) {
            $table->bigIncrements('ds_id');

            $table->string('ds_add_kode', 32);
            $table->string('ds_year', 4);
            $table->string('ds_month', 4);
            $table->string('ds_destination', 32)->nullable();
            $table->string('ds_resident', 4);
            $table->string('ds_bumil', 11);
            $table->string('ds_bumil_resti', 11);
            $table->string('ds_bulin', 11);
            $table->string('ds_bufas', 11);
            $table->string('ds_pus', 11);
            $table->string('ds_bayi_new', 11);
            $table->string('ds_bayi', 11);
            $table->string('ds_bayi_resti', 11);
            $table->string('ds_balita', 11);
            $table->unsignedBigInteger('ds_user_id')->nullable();

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
        Schema::dropIfExists('eianc_data_sasarans');
    }
}
