<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_mobil as mobil;
use App\Models\tbl_order as order;
use App\Models\tbl_tipe_sewa as tipe_sewa;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LandingPageController extends Controller {


    public function Home () {
        $mobil = mobil::limit(9)->get();
        return view('LandingPage.index', compact('mobil'));
    }

    //Home end

    //CarList Start

    public function CarListPage(Request $r)
    {
        
        if ($r->DenganSupir == "false") 
            $mobil = tipe_sewa::where('tipe_sewa', 'Tanpa Supir')->first()->mobil()->get();
        else
            $mobil = tipe_sewa::where('tipe_sewa', 'Dengan Supir')->first()->mobil()->get();
        

        return view('LandingPage.CarPage.CarList', compact('mobil'));
    }

    //CarList End

    //Carlist Single Start

    public function CarSingle(Request $r) {
        $mobil = mobil::find($r->id);

        $search = $mobil->merek()->first()->merek;

        $relateds = mobil::whereHas('merek', function ($query) use ($search) {
            $query->where('merek', 'like', "%$search%");
        })->limit(9)->get();

        return view('LandingPage.CarPage.CarSingle', compact('mobil', 'relateds'));
    }


    //Carlist Single end

    public function BookCar (Request $r) {
        $mobil = mobil::find($r->id);
        
        if ($mobil->status != "Tersedia")
            return redirect()->named('CarListPage');

        if ($mobil->tipe_sewa()->first()->tipe_sewa == "Dengan Supir")
            return view ('LandingPage.BookingPage.formOrderDenganSupir', compact('mobil'));
        else
            return view ('LandingPage.BookingPage.formOrderTanpaSupir', compact('mobil'));
    }


    public function Booking (Request $r) {

        
        
        $BiayaSupir = 150000; // Untuk Tambahan Biaya Jika Dengan Supir
        
        $AlamatRental = "Jl. Jagir Sidoresmo VI/66";
        // Untuk alamat serah terima Jika tanpa supir

        $mobil = mobil::find($r->id);

        if ($mobil->status != "Tersedia") {
            abort(404); 
        }

        $tipe_sewa = $mobil->tipe_sewa()->first();

        if ($tipe_sewa->tipe_sewa == "Dengan Supir") {
            
            $r->validate([
                'penyewa' => 'required',
                'No_tlp' => 'required|numeric',
                'alamat_rumah' => 'required',
                'alamat_temu' => 'required',
                'tanggal_penjemputan' => 'required',
                'jam_pejemputan' => 'required',
                'menit_jam_penjemputan' => 'required',
                'syarat' => 'accepted'
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

        } else if ($tipe_sewa->tipe_sewa == "Tanpa Supir") {

            $r->validate([
                'penyewa' => 'required',
                'No_tlp' => 'required|numeric',
                'alamat_rumah' => 'required',
                'tanggal_pengambilan' => 'required',
                'jam_pengambilan' => 'required',
                'menit_jam_pengambilan' => 'required',
                'tanggal_pengembalian' => 'required',
                'menit_jam_pengembalian' => 'required',
                'jam_pengambilan' => 'required',
                'syarat' => 'accepted'
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

        $order = $user->order()->create($orderData);
        
        $order->mobil()->associate($mobil);
        $mobil->status = "Dalam Sewa";
        
        $order->tipe_sewa()->associate($tipe_sewa);

        $mobil->save();
        $order->save();
        
        return redirect(route('user.bookingBerjalan'));
    }

   



    

}
