<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama',100);
            $table->string('wa_user',20)->unique();
            $table->string('wa_siswa',20)->nullable()->unique();
            $table->string('hubungan',20)->nullable();
            $table->string('password',100);
            $table->integer('roles_id');
            $table->integer('status');
            $table->integer('nominal')->nullable();
            $table->string('kelas',100)->nullable();
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
        Schema::dropIfExists('users');
    }
}
