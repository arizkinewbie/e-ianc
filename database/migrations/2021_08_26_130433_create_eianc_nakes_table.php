<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancNakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_nakes', function (Blueprint $table) {
            $table->bigIncrements('nakes_id');

            $table->string('nakes_name');
            $table->string('nakes_nip', 32);
            $table->string('nakes_sip', 100)->nullable();
            $table->date('nakes_sip_date')->nullable();
            $table->string('nakes_telp');
            $table->string('nakes_province', 32);
            $table->string('nakes_district', 32);
            $table->string('nakes_subdistrict', 32);
            $table->string('nakes_village', 32);
            $table->string('nakes_rt', 32);
            $table->string('nakes_rw', 32);
            $table->string('nakes_address');
            $table->string('nakes_zip_code', 32)->nullable();
            $table->unsignedBigInteger('nakes_user_id')->nullable();
            $table->enum('nakes_status', ['0', '1'])->default('0');

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
        Schema::dropIfExists('eianc_nakes');
    }
}
