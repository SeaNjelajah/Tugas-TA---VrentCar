<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

        DB::table('tbl_mobil')->insert([
            [
                'id_transmisi' => '2',
                'id_tipe_sewa' => '1',
                'id_jenis_mobil' => '7',
                'nama' => "Blue Car",
                'gambar' => '622c699831c96_1.PNG',
                'jumlah_kursi' => '4',
                'kapasitas_koper' => '8',
                'pelat' => 'XX ADW2 2D',
                'millage' => '10000',
                'tahun' => '2022',
                'desc_mb' => 'Dapat Melewati Jalur Apapun; Sungai; Jalan Berlumpur;',
                'harga' => '120000',
                'status' => 'Tersedia',
                'created_at' => '2022-03-12T09:36:24',
                'updated_at' => '2022-03-12T09:36:24'
            ],
            [
                'id_transmisi' => '1',
                'id_tipe_sewa' => '2',
                'id_jenis_mobil' => '3',
                'nama' => "Monipoli",
                'gambar' => '622cd641af33b_gg.png',
                'jumlah_kursi' => '8',
                'pelat' => 'POL YYA I',
                'kapasitas_koper' => '1',
                'millage' => '100000',
                'tahun' => '2022',
                'desc_mb' => 'Monopldad Biasa',
                'harga' => '12000',
                'status' => 'Tersedia',
                'created_at' => '2022-03-12T17:20:01',
                'updated_at' => '2022-03-12T17:20:01'
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
        Schema::dropIfExists('tbl_order');
    }
}
