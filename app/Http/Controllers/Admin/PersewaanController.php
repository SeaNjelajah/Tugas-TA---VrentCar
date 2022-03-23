<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_kartu_keluarga;
use App\Models\tbl_kartu_ktp;
use Illuminate\Http\Request;
use App\Models\tbl_mobil as mobil;
use App\Models\tbl_order as order;
use App\Models\tbl_sim_a;
use App\Models\tbl_supir as supir;
use App\Models\tbl_tipe_bayar as tipe_bayar;
use App\Models\tbl_tipe_sewa as tipe_sewa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersewaanController extends Controller
{
    public function index(Request $r)
    {
        $karyawan = User::has('karyawan')->get();

        if (!empty($r->search)) {

            $search = $r->search;

            $order1 = order::whereHas('mobil', function($query) use ($search) {
                $query->where ('nama', 'like' , "%$search%");
            })->get();

            $order2 = order::whereHas('supir', function($query) use ($search) {
                $query->where ('nama_lengkap', 'like' , "%$search%");
            })->get();

            $order3 = order::whereHas('user', function($query) use ($search) {
                $query->whereHas('member', function($query) use ($search) {
                    $query->where ('nama_lengkap', 'like' , "%$search%");
                });
            })->get();

            $order4 = order::whereHas('tipe_sewa', function($query) use ($search) {
                $query->where ('tipe_sewa', 'like' , "%$search%");

            })->get();

            $order5 = order::where('penyewa', 'like', "%$search%")->get();

            $order = $order1->merge($order2, $order3, $order4);
            

        } else {
            $order = order::all();
        }
        

        if (!empty($r->mulai_sewa) and !empty($r->akhir_sewa)) {
            $Start = Carbon::create($r->mulai_sewa)->toDateTimeLocalString();
            $End = Carbon::create($r->akhir_sewa)->toDateTimeLocalString();

            $order = $order->whereBetween('created_at', [$Start, $End]);

        }

        return view('AdminPage.Persewaan.main', compact('karyawan', 'order'));
    }

    public function CariMobilPersewaan (Request $r) {

        if ($r->dengan_supir == "true") {
            $mobils = tipe_sewa::where('tipe_sewa', 'Dengan Supir')->first()->mobil()->get();
        } else if ($r->dengan_supir == "false") {
            $mobils = tipe_sewa::where('tipe_sewa', 'Tanpa Supir')->first()->mobil()->get();
        } else {
            return redirect()->back()->withInput()->with("failed", "Something wrong! Try again.");
        }

        $mobils = $mobils->where("status", "Tersedia");
        
        $tipe_bayar = tipe_bayar::all();

        return view('AdminPage.Persewaan.PageBuatOrder.main2', compact('mobils', 'tipe_bayar'));
    }

    public function BuatPesanan (Request $r) {


        $BiayaSupir = 150000; // Untuk Tambahan Biaya Jika Dengan Supir
        
        $AlamatRental = "Jl. Jagir Sidoresmo VI/66";
        // Untuk alamat serah terima Jika tanpa supir
        $mobil = mobil::find($r->d_mobil_id);
        
        if ($mobil->status != "Tersedia") {
            abort(404); 
        }

        $r->session()->flash('failed', 'Some input are empty!');

        if ($r->dengan_supir == "true") {
            
            $r->validate([
                'penyewa' => 'required',
                'No_tlp' => 'required|numeric',
                'alamat_rumah' => 'required',
                'alamat_temu' => 'required',
                'tanggal_penjemputan' => 'required',
                'jam_pejemputan' => 'required',
                'menit_jam_penjemputan' => 'required',

                'd_mobil_id' => 'required',
                'bukti_bayar' => 'required|image',
            ]);

            $InputData = $r->only('penyewa', 'No_tlp', 'alamat_rumah', 'alamat_temu', 'durasi_sewa');
            
            $date = Carbon::create (
                $r->tanggal_penjemputan . "T" .
                $r->jam_pejemputan . ":" .
                $r->menit_jam_penjemputan
            );

            $tanggal = [
                "tgl_mulai_sewa" => ($date->toDateTimeLocalString()),
                "tgl_akhir_sewa" => ($date->add('day', $r->durasi_sewa)->toDateTimeLocalString())
            ];

            $harga = $mobil->harga * $r->get('durasi_sewa') + $BiayaSupir; // $BiayaSupir = 150000

            $total = [
                'total' => $harga
            ];

            $status = [
                'status' => 'Baru'
            ];

            $orderData = array_merge(
                $InputData, $tanggal, $total, $status
            );

        } else if ($r->dengan_supir == "false") {

            $r->validate([
                'penyewa' => 'required',
                'No_tlp' => 'required|numeric',
                'alamat_rumah' => 'required',
                'd_mobil_id' => 'required',
                'bukti_bayar' => 'required|image',

                'tanggal_pengambilan' => 'required',
                'jam_pengambilan' => 'required',
                'menit_jam_pengambilan' => 'required',
                'tanggal_pengembalian' => 'required',
                'menit_jam_pengembalian' => 'required',
                'jam_pengambilan' => 'required',

            ]);

            $InputData = $r->only('penyewa', 'No_tlp', 'alamat_rumah');

            $tgl_mulai_sewa = Carbon::create(
                $r->tanggal_pengambilan . "T" . 
                $r->jam_pengambilan . ":" . $r->menit_jam_pengambilan
            );

            $tgl_akhir_sewa = Carbon::create(
                $r->tanggal_pengembalian . "T" . 
                $r->jam_pengembalian . ":" . $r->menit_jam_pengembalian
            );

            $durasi_sewa = $tgl_mulai_sewa->diffInDays($tgl_akhir_sewa);

            $waktu = [
                "tgl_mulai_sewa" => $tgl_mulai_sewa->toDateTimeLocalString(),
                "tgl_akhir_sewa" => $tgl_akhir_sewa->toDateTimeLocalString(),
                "durasi_sewa" => $durasi_sewa
            ];

            $harga = $mobil->harga * $durasi_sewa;

            $total = [
                'total' => $harga
            ];

            $status = [
                'status' => 'Baru'
            ];

            $AlamatSerahTerima = [
                'alamat_temu' => $AlamatRental
            ];

            $orderData = array_merge(
                $InputData, $waktu, $total, $status,
                $AlamatSerahTerima
            );

        } else {
            return redirect()->back()->withInput();
        }

        $user = User::find(Auth::user()->id);

        $tipe_sewa = $mobil->tipe_sewa()->first();

        $order = $user->order()->create($orderData);
        
        $order->mobil()->associate($mobil);

        $mobil->status = "Dalam Sewa";
        $order->tipe_sewa()->associate($tipe_sewa);

        $tipe_bayar = tipe_bayar::find($r->tipe_bayar);
        $order->tipe_bayar()->associate($tipe_bayar);

        $mobil->save();
        $order->save();
        
        //-----------------------------------------------------

        if ($r->hasFile('bukti_bayar')) {

            $punya_bukti_bayar = $order->bukti_bayar()->first() or false;
                
            if ($punya_bukti_bayar) {
                
                $CurrentBuktiBayarName = $order->bukti_bayar()->first()->gambar_bukti;
                
                if (Storage::exists('/public/Bukti_Bayar/' . $CurrentBuktiBayarName))
                Storage::delete('/public/Bukti_Bayar/' . $CurrentBuktiBayarName);
                
            }
            
            $Filename = uniqid() . "_" . $r->file('bukti_bayar')->getClientOriginalName(); 
            Storage::putFileAs('/public/Bukti_Bayar/', $r->file('bukti_bayar'), $Filename);
    
    
            if ($punya_bukti_bayar) {
    
                $bukti_bayar = $order->bukti_bayar()->first();
    
                $bukti_bayar->update([
                    'gambar_bukti' => $Filename,
                    'terverifikasi' => null
                ]);
    
            } else {
    
                $order->bukti_bayar()->create ([
                    'id_order' => $order->id,
                    'gambar_bukti' => $Filename,
                ]);
    
            }

        }

        $r->session()->forget('failed');

        return redirect(route('admin.Persewaan.show'))->with('success', 'Pesanan berhasil ditambahkan');
    }


    public function Setujui (Request $r, $id) {
        $order = order::find($id);
        $tipe_sewa = $order->tipe_sewa()->first()->tipe_sewa;
        $bukti_bayar = $order->bukti_bayar()->first() or false;

        if ($bukti_bayar) {
            if ($bukti_bayar->terverifikasi != "Diterima")
                return redirect()->back()->with('failed', 'Bukti Bayar harus terverifikasi');
        } else {
            return redirect()->back()->with('failed', 'Bukti Bayar harus terverifikasi');
        }

        if ($tipe_sewa == "Tanpa Supir") {
            $penyewa = $order->user()->first();
            $data_member = $penyewa->member()->first();
            
            $ktp = $data_member->ktp()->first() or false;

            if ($ktp) {
                if ($ktp->terverifikasi != "Diterima")
                    return redirect()->back()->with('failed', 'KTP Bayar harus terverifikasi');
            } else {
                return redirect()->back()->with('failed', 'KTP harus terverifikasi');
            }

            $kartu_keluarga = $data_member->kartu_keluarga()->first() or false;

            if ($kartu_keluarga) {
                if ($kartu_keluarga->terverifikasi != "Diterima")
                    return redirect()->back()->with('failed', 'Kartu Keluarga harus terverifikasi');
            } else {
                return redirect()->back()->with('failed', 'Kartu Keluarga harus terverifikasi');
            }

            $sim_a = $data_member->sim_a()->first() or false;

            if ($sim_a) {
                if ($sim_a->terverifikasi != "Diterima")
                    return redirect()->back()->with('failed', 'Bukti Bayar harus terverifikasi');
            } else {
                return redirect()->back()->with('failed', 'SIM A harus terverifikasi');
            }

        }

        if ($tipe_sewa == "Dengan Supir") {
            if (empty($r->data_supir_id) || !is_numeric($r->data_supir_id)) return redirect()->back()->with('failed', 'Please select Driver first!');
            
           
            $karyawan = supir::find($r->data_supir_id);
            $karyawan->status = 'Dalam Tugas';

            $order->supir()->associate($karyawan);
            $karyawan->save();
        }

        
        $order->status = "Dalam Persewaan";
        
        $order->status_order()->create([
            'id_order' => $order->id,
            'status' => "Disetujui",
            'created_at' => now()->toDateTimeLocalString()
        ]);
        
        $order->save();
        
        return redirect()->back()->with('success', 'The order has processed');
    }

    public function VerifikasiBukti (Request $r) {
        $bukti_bayar = order::find($r->id)->bukti_bayar()->first() or false;
        if ($bukti_bayar) {

            $bukti_bayar->terverifikasi = "Diterima";
            $bukti_bayar->save();

            return redirect()->back()->with('success', 'Verifikasi Berhasil');
        }
        return redirect()->back()->with('failed', 'Verifikasi Gagal');
    }

    public function TolakBuktiBayar (Request $r) {
        $bukti_bayar = order::find($r->id)->bukti_bayar()->first() or false;

        if ($bukti_bayar) {

            $bukti_bayar->terverifikasi = "Ditolak";
            $bukti_bayar->save();

            return redirect()->back()->with('success', 'Verifikasi Berhasil Ditolak');
        }
        return redirect()->back()->with('failed', 'Verifikasi Gagal');
    }

    public function VerifikasiKTP (Request $r) {
        $ktp = tbl_kartu_ktp::find($r->ktp_id) or false;

        if ($ktp) {

            $ktp->terverifikasi = "Diterima";
            $ktp->save();

            return redirect()->back()->with('success', 'Verifikasi KTP Berhasil');
        }
        return redirect()->back()->with('failed', 'Verifikasi KTP Gagal');
    }

    public function TolakKTP (Request $r) {
        $ktp = tbl_kartu_ktp::find($r->ktp_id) or false;

        if ($ktp) {

            $ktp->terverifikasi = "Ditolak";
            $ktp->save();

            return redirect()->back()->with('success', 'Verifikasi KTP Berhasil Ditolak');
        }

        return redirect()->back()->with('failed', 'Verifikasi Tolak KTP Gagal');
    }

    public function VerifikasiKartuKeluarga (Request $r) {
        $kartu_keluarga = tbl_kartu_keluarga::find($r->kartu_keluarga_id) or false;

        if ($kartu_keluarga) {

            $kartu_keluarga->terverifikasi = "Diterima";
            $kartu_keluarga->save();

            return redirect()->back()->with('success', 'Verifikasi Kartu Keluarga Berhasil');
        }
        return redirect()->back()->with('failed', 'Verifikasi Kartu Keluarga Gagal');
    }

    public function TolakKartuKeluarga (Request $r) {
        $kartu_keluarga = tbl_kartu_keluarga::find($r->kartu_keluarga_id) or false;

        if ($kartu_keluarga) {

            $kartu_keluarga->terverifikasi = "Ditolak";
            $kartu_keluarga->save();

            return redirect()->back()->with('success', 'Verifikasi Kartu Keluarga Berhasil Ditolak');
        }

        return redirect()->back()->with('failed', 'Verifikasi Tolak Kartu Keluarga Gagal');
    }

    public function VerifikasiSimA (Request $r) {
        $sim_a = tbl_sim_a::find($r->sim_a_id) or false;

        if ($sim_a) {

            $sim_a->terverifikasi = "Diterima";
            $sim_a->save();

            return redirect()->back()->with('success', 'Verifikasi SIM A Berhasil');
        }
        return redirect()->back()->with('failed', 'Verifikasi SIM A Gagal');
    }

    public function TolakSimA (Request $r) {
        $sim_a = tbl_sim_a::find($r->sim_a_id) or false;

        if ($sim_a) {

            $sim_a->terverifikasi = "Ditolak";
            $sim_a->save();

            return redirect()->back()->with('success', 'Verifikasi SIM A Berhasil Ditolak');
        }

        return redirect()->back()->with('failed', 'Verifikasi Tolak SIM A Gagal');
    }


    public function Batalkan ($id) {
        
        $order = order::find($id);

        $status_awal_order = $order->status;

        $order->status = "Dibatalkan";
       

        $mobil = $order->mobil()->first();
        $mobil->status = "Tersedia";
        

        $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;

        if ($tipe_sewa == "Dengan Supir" and $status_awal_order != "Baru") {
            $supir = $order->supir()->first();
            $supir->status = "Siap";
        }

        $order->status_order()->create([
            'status' => 'Dibatalkan',
            'created_at' => now()->toDateTimeLocalString()
        ]);

        $order->save();
        $mobil->save();
       
        if ($tipe_sewa == "Dengan Supir" and $status_awal_order != "Baru") {
            $supir->save();
        }

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
        
        
        $mobil->status = "Tersedia";
        $order->status = "Selesai";

        $tipe_sewa = $order->tipe_sewa()->first()->tipe_sewa;
        
        if ($tipe_sewa == "Dengan Supir") {
            $supir = $order->supir()->first();
            $supir->status = "Siap";
            $supir->save();
        }

        $mobil->save();
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

    public function TambahDenda (Request $r) {

        $r->session()->flash('failed', 'Gagal menambahkan denda');

        $r->validate([
            'order_id' => 'required|numeric',
            'denda' => 'required|numeric',
            'deskripsi' => 'nullable',
        ]);

        $r->session()->forget('failed');

        $order = order::find($r->order_id);
        $inputData = $r->only('denda', 'deskripsi');

        $order->total += $r->denda;
        $order->denda()->create($inputData);

        $order->save();

        return redirect()->back()->with('success', 'berhasil menambahkan denda baru');
    }

    

    
}
