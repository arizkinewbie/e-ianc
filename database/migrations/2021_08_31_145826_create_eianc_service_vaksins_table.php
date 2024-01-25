<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancServiceVaksinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_service_vaksins', function (Blueprint $table) {
            $table->bigIncrements('svak_id');

            $table->unsignedBigInteger('svak_ins_id');
            $table->unsignedSmallInteger('svak_servak_id');
            $table->date('svak_date');
            $table->string('svak_pay', 10);
            $table->string('svak_noka', 16)->nullable();
            $table->string('svak_norm', 10);
            $table->unsignedBigInteger('svak_vak_id');
            $table->string('svak_dosis', 50);
            $table->string('svak_temp', 50);

            $table->enum('svak_demam', ['0', '1'])->nullable();
            $table->enum('svak_bengkak', ['0', '1'])->nullable();
            $table->enum('svak_merah', ['0', '1'])->nullable();
            $table->enum('svak_muntah', ['0', '1'])->nullable();
            $table->text('svak_lainnya')->nullable();

            $table->string('svak_reg_no', 100);
            $table->unsignedBigInteger('svak_user_id')->nullable();

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
        Schema::dropIfExists('eianc_service_vaksins');
    }
}
