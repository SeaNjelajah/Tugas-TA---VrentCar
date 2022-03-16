<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_denda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->nullable()->constrained('tbl_order')->cascadeOnUpdate()->nullOnDelete();
            $table->bigInteger('denda');
            $table->string('deskripsi');
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
        Schema::dropIfExists('tbl_denda');
    }
}
