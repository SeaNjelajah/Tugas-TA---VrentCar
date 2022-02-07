<?php

use App\Models\tagList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTagContainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_contains', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(tagList::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('contain');
            $table->timestamps();
        });

        DB::table('tag_contains')->insert([
            [
                'tag_list_id' => 2,
                'contain' => 'Dengan Supir'
            ],
            [
                'tag_list_id' => 2,
                'contain' => 'Tanpa Supir'
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
        Schema::dropIfExists('tag_contains');
    }
}
