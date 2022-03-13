<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreateTipeSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tipe_sewa', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_sewa');
        });

        DB::table('tbl_tipe_sewa')->insert([
            [
                'tipe_sewa' => 'Dengan Supir'
            ],
            [
                'tipe_sewa' => 'Tanpa Supir'
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
        Schema::dropIfExists('tbl_tipe_sewa');
    }
}
