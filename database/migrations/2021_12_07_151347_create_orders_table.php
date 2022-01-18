<?php

use App\Models\DMobil;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DMobil::class)->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->string("nama");
            $table->string("No_tlp");
            $table->date("mulai_sewa");
            $table->date("akhir_sewa");
            $table->string("tipe_sewa");
            $table->string("address_home");
            $table->string("address_serah_terima")->nullable();
            $table->string("tipe_bayar");
            $table->integer("total");
            $table->string("bukti_bayar")->nullable();
            $table->enum('status', ['Baru', 'Dalam Persewaan', 'Selesai', 'Dibatalkan']);
            $table->enum('status_proses', ["Dalam Antrian", 'Disetujui','Dalam Perjalanan Menemui Penyewa' ,'Sudah Menemui Penyewa', 'Dalam Sewa', 'Selesai'])->nullable();
            $table->string('historical_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
