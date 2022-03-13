<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreateTblTransmisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transmisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_transmisi');
        });

        DB::table('tbl_transmisi')->insert([
            [
                'nama_transmisi' => 'Manual'
            ],
            [
                'nama_transmisi' => 'Automatic'
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
        Schema::dropIfExists('tbl_transmisi');
    }
}
