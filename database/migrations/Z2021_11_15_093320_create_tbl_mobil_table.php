<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mobil', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_transmisi')->nullable()->constrained('tbl_transmisi')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_tipe_sewa')->nullable()->constrained('tbl_tipe_sewa')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_feature')->nullable()->constrained('tbl_feature')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_jenis_mobil')->nullable()->constrained('tbl_jenis_mobil')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_merek')->nullable()->constrained('tbl_merek_mobil')->nullOnDelete()->cascadeOnUpdate();

            $table->string('nama');
            $table->string('gambar');
            $table->string('jumlah_kursi');
            $table->integer('kapasitas_koper');
            $table->bigInteger('millage');
            $table->year('tahun');
            $table->string('pelat');
            $table->text('desc_mb')->nullable();
            $table->bigInteger('harga');
            $table->enum('status', ['Tersedia', 'Tidak Tersedia', 'Dalam Sewa'])->nullable();
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
        Schema::dropIfExists('tbl_order');
    }
}
