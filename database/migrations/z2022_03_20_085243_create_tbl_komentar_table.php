<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_komentar');
        
        Schema::create('tbl_komentar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_post')->constrained('tbl_post')->cascadeOnDelete()->cascadeOnUpdate();

            $table->text('komentar');
            $table->timestamps();
        });

        Schema::table('tbl_komentar', function (Blueprint $table) {
            $table->foreignId('id_membalas')->nullable()->constrained('tbl_komentar')->cascadeOnDelete()->cascadeOnUpdate();
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_komentar');
    }
}
