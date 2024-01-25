<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceAncAnamnesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_anc_anamnesas', function (Blueprint $table) {
            $table->bigIncrements('sanca_id');

            $table->unsignedBigInteger('sanca_anc_d_id');
            $table->date('sanca_date');
            $table->string('sanca_uk', '16');
            $table->string('sanca_trimester', '16');
            $table->unsignedSmallInteger('sanca_lpc');
            $table->string('sanca_stomach', 2);
            $table->string('sanca_dizzy', 2);
            $table->string('sanca_gag', 2);
            $table->string('sanca_appetite', 2);
            $table->string('sanca_bleeding', 2);
            $table->text('sanca_kdrt')->nullable();
            $table->text('sanca_allergy')->nullable();
            $table->text('sanca_complaint')->nullable();
            $table->unsignedBigInteger('sanca_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_anc_anamnesas');
    }
}
