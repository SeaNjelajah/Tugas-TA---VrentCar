<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTglRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tgl_riwayat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->nullable()->constrained('tbl_order')->cascadeOnUpdate()->nullOnDelete();
            $table->string('aksi');
            $table->datetime('pada_tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tgl_riwayat');
    }
}
