<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBuktibayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bukti_bayar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->nullable()->constrained('tbl_order')->cascadeOnUpdate()->nullOnDelete();
            $table->string('gambar_bukti');
            $table->enum('terverifikasi', ['Ditolak', 'Diterima'])->nullable();
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
        Schema::dropIfExists('tbl_bukti_bayar');
    }
}
