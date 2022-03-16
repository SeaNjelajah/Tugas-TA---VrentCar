<?php
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTblOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_mobil')->nullable()->constrained('tbl_mobil')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('id_supir')->nullable()->constrained('tbl_supir')->onDelete('set null')->onUpdate('cascade');
            $table->foreignIdFor(User::class)->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('id_tipe_bayar')->nullable()->constrained('tbl_tipe_bayar')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('id_tipe_sewa')->nullable()->constrained('tbl_tipe_sewa')->onDelete('set null')->onUpdate('cascade');
            


            $table->enum('status', ['Baru', 'Dalam Persewaan', 'Selesai', 'Dibatalkan']);

            $table->string("penyewa");
            $table->string("No_tlp");
            $table->integer('durasi_sewa');
            $table->dateTime("tgl_mulai_sewa");
            $table->dateTime("tgl_akhir_sewa");
            $table->string("alamat_rumah");
            $table->string("alamat_temu")->nullable();

            $table->bigInteger("total"); 
            
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
