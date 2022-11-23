<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->string('id_ujian',20)->primary()->unique();
            $table->date('tanggal_ujian',50);
            $table->string('mapel',50);
            $table->integer('jml_benar');
            $table->integer('jml_salah');
            $table->integer('jml_kosong');
            $table->integer('nilai');
            $table->string('wa_user',200);
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
        Schema::dropIfExists('ujians');
    }
}
