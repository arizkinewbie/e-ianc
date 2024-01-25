<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceNifasRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_nifas_recipes', function (Blueprint $table) {
            $table->bigIncrements('sancnr_id');

            $table->string('sancnr_n_id');
            $table->string('sancnr_type', 2);
            $table->unsignedBigInteger('sancnr_drug_id');
            $table->string('sancnr_qty', 10);
            $table->string('sancnr_dosis', 10);
            $table->string('sancnr_use', 10);

            $table->unsignedBigInteger('sancnr_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_nifas_recipes');
    }
}
