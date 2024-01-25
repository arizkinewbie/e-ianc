<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncLabImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_lab_images', function (Blueprint $table) {
            $table->bigIncrements('sancli_id');

            $table->unsignedBigInteger('sancli_lab_id');
            $table->string('sancli_image');
            $table->unsignedBigInteger('sancli_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_lab_images');
    }
}
