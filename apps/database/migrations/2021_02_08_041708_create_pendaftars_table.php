<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->string('email')->unique()->nullable();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('jk', 100);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('province_ktp');
            $table->string('city_ktp');
            $table->string('district_ktp');
            $table->string('village_ktp');
            $table->string('alamat_ktp');
            $table->string('province_domisili');
            $table->string('city_domisili');
            $table->string('district_domisili');
            $table->string('village_domisili');
            $table->string('alamat_domisili');
            $table->string('agama');
            $table->string('no_kontak');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('pas_foto')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('pendaftars');
    }
}
