<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTblJenisMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jenis_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_mobil');
            $table->timestamps();
        });

        DB::table('tbl_jenis_mobil')->insert([
            [
                'jenis_mobil' => 'Sport'
            ],
            [
                'jenis_mobil' => 'SUV'
            ],
            [
                'jenis_mobil' => 'Convertible'
            ],
            [
                'jenis_mobil' => 'Coupe'
            ],
            [
                'jenis_mobil' => 'MPV'
            ],
            [
                'jenis_mobil' => 'Station Wagon'
            ],
            [
                'jenis_mobil' => 'Off-Road'
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_jenis_mobil');
    }
}
