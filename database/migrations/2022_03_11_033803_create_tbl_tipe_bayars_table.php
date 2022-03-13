<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTblTipeBayarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tipe_bayar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
        });

        DB::table('tbl_tipe_bayar')->insert([
            [
                'nama' => 'BCA',
                'deskripsi' => 'Rekening BCA : 0777562792898'
            ],
            [
                'nama' => 'Langsung',
                'deskripsi' => 'Pembayaran Langsung'
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tipe_bayar');
    }
}
