<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncTreatmentRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_treatment_recipes', function (Blueprint $table) {
            $table->bigIncrements('sanctr_id');

            $table->unsignedBigInteger('sanctr_t_id');
            $table->unsignedBigInteger('sanctr_drug_id');
            $table->string('sanctr_qty', 10);
            $table->string('sanctr_dosis', 10);
            $table->string('sanctr_use', 5);

            $table->unsignedBigInteger('sanctr_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_treatment_recipes');
    }
}
