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
        $mobil = mobil::all();
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
        return view('LandingPage.CarPage.CarSingle', compact('mobil'));
    }


    //Carlist Single end

    public function BookCar (Request $r) {
        
        $mobil = mobil::find($r->id);
        if ($mobil->status != "Tersedia")
            return redirect()->intended(route('CarListPage'));

        if ($mobil->tipe_sewa()->first()->tipe_sewa == "Dengan Supir")
            return view ('LandingPage.ZTemplate.formOrder', compact('mobil'));
        else
            return view ('LandingPage.ZTemplate.formOrderTanpaSupir', compact('mobil'));

    }

    public function BookCarGet (Request $r) {
    
        $mobil = mobil::find($r->id);

        if ($mobil->tipe_sewa()->first()->tipe_sewa == "Dengan Supir")
            return view ('LandingPage.ZTemplate.formOrder', compact('mobil'));
        else
            return view ('LandingPage.ZTemplate.formOrderTanpaSupir', compact('mobil'));

    }

    public function Booking (Request $r) {
    
        
        $r->validate([
            'penyewa' => 'required',
            'No_tlp' => 'required|numeric',
            'alamat_rumah' => 'required',
            'alamat_temu' => 'required'
        ]);

        $mobil = mobil::find($r->id);
        $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;

        if ($tipe_sewa == "Dengan Supir") {
            $new = $r->only('penyewa', 'No_tlp', 'alamat_rumah', 'alamat_temu', 'durasi_sewa');
            
            $tanggal = Carbon::create (
                $r->tanggal_penjemputan . "T" .
                $r->jam_pejemputan . ":" .
                $r->menit_jam_penjemputan
            );

            $arr_tanggal = [
                "tgl_mulai_sewa" => ($tanggal->toDateTimeLocalString()),
                "tgl_akhir_sewa" => ($tanggal->add('day', $r->durasi_sewa)->toDateTimeLocalString())
            ];

            $total = $mobil->harga * $r->get('durasi_sewa');

            $total = [
                'total' => $total
            ];

            $status = [
                'status' => 'Baru'
            ];

            $order = order::create(array_merge($new, $arr_tanggal, $total, $status));
            
            
            $order->mobil()->associate($mobil);
            $mobil->status = "Dalam Sewa";
            $mobil->save();

            $tp_sewa = tipe_sewa::where('tipe_sewa', 'Dengan Supir')->first();
            $order->tipe_sewa()->associate($tp_sewa);

            $user = User::find(Auth::user()->id);
            $order->user()->associate($user);

            $order->save();

        } else if ($tipe_sewa == "Tanpa Supir") {

        } else {
            return redirect()->back()->withInput();
        }
        
        return redirect(route('user.bookingBerjalan'));
    }

   



    

}
