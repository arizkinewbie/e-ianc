<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEiancKbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eianc_kbs', function (Blueprint $table) {
            $table->bigIncrements('kb_id');

            $table->unsignedBigInteger('kb_ins_id');
            $table->unsignedBigInteger('kb_kbt_id');
            $table->string('kb_brand');
            $table->string('kb_batch')->nullable();
            $table->string('kb_netto');
            $table->string('kb_unit');
            $table->date('kb_received_date');
            $table->date('kb_expired_date');
            $table->string('kb_remainder', 10)->nullable();
            $table->unsignedBigInteger('kb_user_id')->nullable();

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
        Schema::dropIfExists('eianc_kbs');
    }
}
