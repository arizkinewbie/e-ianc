<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancInstansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_instansis', function (Blueprint $table) {
            $table->bigIncrements('ins_id');

            $table->string('ins_code');
            $table->string('ins_name');
            $table->unsignedSmallInteger('ins_type');
            $table->string('ins_province', 32);
            $table->string('ins_district', 32);
            $table->string('ins_subdistrict', 32);
            $table->string('ins_village', 32);
            $table->string('ins_rw', 5);
            $table->string('ins_rt', 5);
            $table->string('ins_address');
            $table->string('ins_telp', 16);
            $table->string('ins_zip_code', 32)->nullable();
            $table->string('ins_thumb')->nullable();
            $table->enum('ins_bpjs', ['0', '1'])->default('0');
            $table->unsignedBigInteger('ins_user_id')->nullable();
            $table->enum('ins_status', ['0', '1'])->default('0');

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
        Schema::dropIfExists('eianc_instansis');
    }
}
