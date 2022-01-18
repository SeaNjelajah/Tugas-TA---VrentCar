<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSupirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_supirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gmb_sp');
            $table->string('al_sp');
            $table->enum('status', ['Tidak Tersedia', 'Siap', 'Dalam Tugas']);
            $table->string('no_tlp');
            $table->string('gj_sp');
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
        Schema::dropIfExists('data_supirs');
    }
}
