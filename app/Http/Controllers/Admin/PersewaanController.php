<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_mobil as mobil;
use App\Models\tbl_order as order;
use App\Models\tbl_supir as supir;
use App\Models\tbl_tipe_bayar as tipe_bayar;
use App\Models\tbl_tipe_sewa as tipe_sewa;
use Carbon\Carbon;


class PersewaanController extends Controller
{
    public function index(Request $r)
    {
        
        $supir = supir::all();
        $order = order::all(); 

        return view('AdminPage.Persewaan.main', compact('supir', 'order'));
    }

    public function CariMobilPersewaan (Request $r) {

        if ($r->dengan_supir == "true") {
            $mobil = tipe_sewa::where('tipe_sewa', 'Dengan Supir')->first()->mobil()->get();
        } else if ($r->dengan_supir == "false") {
            $mobil = tipe_sewa::where('tipe_sewa', 'Tanpa Supir')->first()->mobil()->get();
        } else {
            return redirect()->back()->withInput()->with("failed", "Something wrong! Try again.");
        }
        
        //$data = mobil::whereRaw('json_contains(destinations, \'["' . "Dengan Supir" . '"]\')')->get();
        $tipe_bayar = tipe_bayar::all();

        return view('AdminPage.Persewaan.PageBuatOrder.main2', compact('mobil', 'tipe_bayar'));
    }

    public function BuatPesanan (Request $r) {
        
        $r->session()->flash('failed', 'Some input are empty!');
        
        $r->validate([
            "nama" => ['required'],
            "No_tlp" => ['required'],
            "address_home" => ['required'],
            "total" => ['required'],
            "tipe_bayar" => ['required']
        ]);

        $r->session()->forget('failed');


        if($r->hasFile('GMB_Bukti') && $r->GMB_Bukti != "NoImageA.png") {
            $filename = explode(".", $r->file('GMB_Bukti')->getClientOriginalName())[0] . "_" . time() . '.' . $r->GMB_Bukti->extension();
            $r->file('GMB_Bukti')->move(public_path('assets/img/dataimg/buktibayar'), $filename);
        } else {
            $filename = null;
        }


        if ($r->dengan_supir == "true") {

            $tanggal = Carbon::create (
                $r->tanggal_penjemputan . "T" .
                $r->jam_pejemputan . ":" .
                $r->menit_jam_penjemputan
            );

            order::create([
                "d_mobil_id" => $r->d_mobil_id,
                "nama" => $r->nama,
                "No_tlp" => $r->No_tlp,
                "mulai_sewa" => ($tanggal->toDateTimeLocalString()),
                "akhir_sewa" => ($tanggal->add('day', $r->durasi_sewa)->toDateTimeLocalString()),
                "tipe_sewa" => "Dengan Supir",
                "address_home" => $r->address_home,
                "address_serah_terima" => $r->address_serah_terima,
                "tipe_bayar" => $r->tipe_bayar,
                "total" => $r->total,
                "bukti_bayar" => $filename,
                "status" => "Baru",
                "status_proses" => "Dalam Antrian"
            ]);

        } else if ($r->dengan_supir == "false") {
        

            $tanggal_pengambilan = $r->tanggal_pengambilan."T".$r->jam_pengambilan.":".$r->menit_jam_pengambilan;
            $tanggal_pengembalian = $r->tanggal_pengembalian."T".$r->jam_pengembalian.":".$r->menit_jam_pengembalian;

            order::create([
                "d_mobil_id" => $r->d_mobil_id,
                "nama" => $r->nama,
                "No_tlp" => $r->No_tlp,
                "mulai_sewa" => Carbon::create($tanggal_pengambilan)->toDateTimeLocalString(),
                "akhir_sewa" => Carbon::create($tanggal_pengembalian)->toDateTimeLocalString(),
                "tipe_sewa" => "Tanpa Supir",
                "alamat_rumah" => $r->address_home,
                "alamat_temu" => $r->address_serah_terima,
                "tipe_bayar" => $r->tipe_bayar,
                "total" => $r->total,
                "bukti_bayar" => $filename,
                "status" => "Baru",
                "status_proses" => "Dalam Antrian"
            ]);

        }

        $mobil = mobil::find($r->d_mobil_id);
        $mobil->status = "Dalam Sewa";
        $mobil->save();

        return redirect(route('admin.Persewaan.show'))->with('success', 'Pesanan berhasil ditambahkan');
    }


    public function Setujui (Request $r, $id) {
        
        $data = order::find($id);

        if (strcmp($data->tipe_sewa , "Dengan Supir") == 0) {
            if (empty($r->data_supir_id) || !is_numeric($r->data_supir_id)) return redirect()->back()->with('failed', 'Please select Driver first!');
            $data->data_supir_id = $r->data_supir_id;

            $supir = supir::find($r->data_supir_id);
            $supir->status = "Dalam Tugas";
            $supir->save();
        }

        
        $data->status = "Dalam Persewaan";
        $data->status_proses = "Disetujui";
        $data->historical_date = json_encode(array_merge(json_decode((empty($data->historical_date)) ? "[]" : $data->historical_date, 1), ['Disetujui' => Carbon::now()->toDateTimeString()]));
        $data->save();
        
        return redirect()->back()->with('success', 'The order has processed');
    }

    public function Batalkan ($id) {
        

        $data = order::find($id);

        $data->status = "Dibatalkan";
        $data->save();

        $mobil = mobil::find($data->d_mobil_id);
        $mobil->status = "Tersedia";
        $mobil->save();

        if (strcmp($data->tipe_sewa , "Dengan Supir") == 0) {
            $supir = supir::find($data->data_supir_id);
            $supir->status = "Dalam Tugas";
            $supir->save();
        }

        return redirect()->back()->with('success', 'The order has canceled');
    }

    
}
