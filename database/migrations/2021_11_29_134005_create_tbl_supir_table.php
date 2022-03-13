<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supir', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto_diri')->nullable();
            $table->string('alamat_rumah')->nullable();
            $table->enum('status', ['Tidak Tersedia', 'Siap', 'Dalam Tugas']);
            $table->string('no_tlp')->nullable();;
            $table->bigInteger('gaji')->nullable();
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
        Schema::dropIfExists('tbl_supir');
    }
}
