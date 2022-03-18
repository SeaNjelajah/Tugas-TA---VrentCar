<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKartuKtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kartu_ktp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->constrained('tbl_member')->nullOnDelete()->cascadeOnUpdate();
            $table->string('kartu_ktp');
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
        Schema::dropIfExists('tbl_kartu_ktp');
    }
}
