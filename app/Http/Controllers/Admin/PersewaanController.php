<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_mobil as mobil;
use App\Models\tbl_order as order;
use App\Models\tbl_supir as supir;
use App\Models\tbl_tipe_bayar as tipe_bayar;
use App\Models\tbl_tipe_sewa as tipe_sewa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class PersewaanController extends Controller
{
    public function index(Request $r)
    {
        
        $karyawan = User::has('karyawan')->get();
        $order = order::all();

        return view('AdminPage.Persewaan.main', compact('karyawan', 'order'));
    }

    public function CariMobilPersewaan (Request $r) {

        if ($r->dengan_supir == "true") {
            $mobil = tipe_sewa::where('tipe_sewa', 'Dengan Supir')->first()->mobil()->get();
        } else if ($r->dengan_supir == "false") {
            $mobil = tipe_sewa::where('tipe_sewa', 'Tanpa Supir')->first()->mobil()->get();
        } else {
            return redirect()->back()->withInput()->with("failed", "Something wrong! Try again.");
        }
        
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

            $order = order::create([
                "penyewa" => $r->nama,
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

            $mobil = mobil::find($r->d_mobil_id);
            $order->mobil()->associate($mobil);


            $order->save();

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
        $order = order::find($id);
        
        $bukti_bayar = $order->bukti_bayar()->first();

        if (empty($bukti_bayar->terverifikasi)) {
            return redirect()->back()->with('failed', 'Bukti Bayar harus terverifikasi');
        }

        if (strcmp($order->tipe_sewa()->first()->tipe_sewa , "Dengan Supir") == 0) {
            if (empty($r->data_supir_id) || !is_numeric($r->data_supir_id)) return redirect()->back()->with('failed', 'Please select Driver first!');
            
            $user = User::find($r->data_supir_id);
            $karyawan = $user->karyawan()->first();
            $karyawan->status = 'Dalam Tugas';

            $order->supir()->associate($karyawan);
            $order->user()->associate($user);
        }

        
        $order->status = "Dalam Persewaan";
        
        $order->status_order()->create([
            'id_order' => $order->id,
            'status' => "Disetujui",
            'created_at' => now()->toDateTimeLocalString()
        ]);
        
        $karyawan->save();
        $order->save();
        
        return redirect()->back()->with('success', 'The order has processed');
    }

    public function VerifikasiBukti (Request $r) {
        $bukti_bayar = order::find($r->id)->bukti_bayar()->first() or false;
        if ($bukti_bayar) {
            $bukti_bayar->terverifikasi = 1;
            $bukti_bayar->save();

            return redirect()->back()->with('success', 'Verifikasi Berhasil');
        }
        return redirect()->back()->with('failed', 'Verifikasi Gagal');
    }

    public function Batalkan ($id) {
        
        $order = order::find($id);
        $order->status = "Dibatalkan";
       

        $mobil = $order->mobil()->first();
        $mobil->status = "Tersedia";
        

        $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;

        if ($tipe_sewa == "Dengan Supir") {
            $supir = $order->supir()->first();
            $supir->status = "Siap";
        }

        $order->status_order()->create([
            'status' => 'Dibatalkan',
            'created_at' => now()->toDateTimeLocalString()
        ]);

        $order->save();
        $mobil->save();
        $supir->save();

        return redirect()->back()->with('success', 'The order has canceled');
    }

    public function update_status_order (Request $r) {
        $order = order::find($r->id);

        $order->status_order()->create([
            'status' => $r->status,
            'created_at' => now()->toDateTimeLocalString()
        ]);

        return redirect()->back()->with('success', 'status order updated!');
    }

    public function Selesai (Request $r) {

        $order = order::find($r->id);

        $mobil = $order->mobil()->first();

        $user = $order->user()->first();
        $supir = $user->karyawan()->first();

        $mobil->status = "Tersedia";
        $supir->status = "Siap";
        $order->status = "Selesai";

        $mobil->save();
        $supir->save();
        $order->save();

        $order->status_order()->create([
            'status' => 'Selesai',
            'created_at' => now()->toDateTimeLocalString()
        ]);
        
        return redirect()->back()->with('success', 'Order telah diselesaikan!');
    }

    public function getBuktiBayar (Request $r) {
        if (Auth::check() and Auth::user()->group == "admin") {
            if (Storage::file_exists ('/Bukti_Bayar/' . $r->nama)) {
                response()->file(Storage::get('/Bukti_Bayar/' . $r->nama));
            } 
        }

        return response('failed');
    }

    

    
}
