<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTblMereksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_merek_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->timestamps();
        });

        DB::table('tbl_merek_mobil')->insert([
            [
                'merek' => 'Avanza'
            ],
            [
                'merek' => 'Honda'
            ],
            [
                'merek' => 'Crovelet'
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
        Schema::dropIfExists('tbl_merek_mobil');
    }
}
