<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_labs', function (Blueprint $table) {
            $table->bigIncrements('sancl_id');

            $table->unsignedBigInteger('sancl_anc_d_id');
            $table->string('sancl_blood', 5);
            $table->string('sancl_urine', 5);
            $table->string('sancl_hiv', 5);
            $table->string('sancl_blood_sugar', 5)->nullable();
            $table->string('sancl_bta', 5);
            $table->string('sancl_malaria', 5);
            $table->string('sancl_hbsag', 5);
            $table->string('sancl_sifilis', 5);
            $table->string('sancl_hb', 5);
            $table->string('sancl_level_hb', 5)->nullable();
            $table->unsignedBigInteger('sancl_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_labs');
    }
}
