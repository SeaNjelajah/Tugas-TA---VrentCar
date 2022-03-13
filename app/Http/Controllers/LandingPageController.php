<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_mobil as mobil;
use App\Models\tbl_tipe_sewa as tipe_sewa;
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
    }
}
