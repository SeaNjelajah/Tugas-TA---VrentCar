<?php

use App\Models\order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatusOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_status_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->nullable()->constrained('tbl_order')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamp('created_at');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_status_order');
    }
}
