<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSimATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sim_a', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->constrained('tbl_member')->nullOnDelete()->cascadeOnUpdate();
            $table->string('sim_a');
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
        Schema::dropIfExists('tbl_sim_a');
    }
}
