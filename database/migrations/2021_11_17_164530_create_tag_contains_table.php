<?php

use App\Models\tagList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
