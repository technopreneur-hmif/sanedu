<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->string('id_pembayaran',20)->primary()->unique();
            $table->date('tanggal_pembayaran',50);
            $table->integer('nominal');
            $table->integer('pembayaran_ke');
            $table->string('status',20);
            $table->string('bukti_pembayaran',250);
            $table->string('keterangan',250);
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
        Schema::dropIfExists('pembayarans');
    }
}
