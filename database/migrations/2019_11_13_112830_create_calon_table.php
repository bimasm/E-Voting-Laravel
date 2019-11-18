<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id')->on('jurusan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            $table->string('deskripsi');
            $table->string('status');
            $table->string('foto')->nullable();
            $table->integer('suara');
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
        Schema::dropIfExists('calon');
    }
}
