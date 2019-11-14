<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id')->on('jurusan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('nim')->unique();
            $table->string('password');
            $table->integer('id_panitia')->unsigned();
            $table->foreign('id_panitia')->references('id')->on('panitia')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('statuspilih');
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
        Schema::dropIfExists('mahasiswa');
    }
}
