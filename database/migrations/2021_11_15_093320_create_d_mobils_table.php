<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mb');
            $table->string('gmb_mb');
            $table->string('jml_tp_d');
            $table->string('bagasi');
            $table->string('millage');
            $table->string('t_mb');            
            $table->string('plat_mb');
            $table->json('tag_mb')->nullable();
            $table->longText('desc_mb')->nullable();
            $table->string('harga_mb');
            $table->enum('status', ['Tersedia', 'Tidak Tersedia', 'Dalam Sewa'])->nullable();
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
        Schema::dropIfExists('d_mobils');
    }
}
