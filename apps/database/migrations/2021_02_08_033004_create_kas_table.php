<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->string('no_bukti')->default('-');
            $table->text('ket');
            $table->foreignId('kategori_id')->nullable();
            $table->bigInteger('nilai');
            $table->string('jenis', 1);
            $table->date('tgl');
            $table->bigInteger('ntag')->nullable();
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
        Schema::dropIfExists('kas');
    }
}
