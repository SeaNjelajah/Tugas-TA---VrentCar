<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTagListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_lists', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tag');
            $table->timestamps();
        });

        DB::table('tag_lists')->insert([
            [
                'nama_tag' => 'Merek'
            ],
            [
                'nama_tag' => 'Supir'
            ],
            [
                'nama_tag' => 'Transmission'
            ],
            [
                'nama_tag' => 'Fuel'
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
        Schema::dropIfExists('tag_lists');
    }
}
