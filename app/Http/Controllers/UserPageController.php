<?php

namespace App\Http\Controllers;

use App\Models\tbl_order as order;
use App\Models\tbl_tipe_bayar as tipe_bayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserPageController extends Controller
{
    public function DashboardPage () {
        return view('LandingPage.AccountPage.Dashboard');
    }

    public function BookingBerjalanPage () {
        return view('LandingPage.AccountPage.BookingBerjalan');
    }

    public function RingkasanOrder(Request $r) {
        $order = order::find($r->id);
        $tipe_bayar = tipe_bayar::all();
        
        if (!empty($order))
            return view('LandingPage.ZTemplate.RingkasanOrder', compact('order', 'tipe_bayar'));
        else
            return redirect()->intended(route('user.dashboard'));
    }

    public function RingkasanOrderGet(Request $r) {
        $order = order::find($r->id);
        $tipe_bayar = tipe_bayar::all();
        
        if (!empty($order))
            return view('LandingPage.ZTemplate.RingkasanOrder', compact('order', 'tipe_bayar'));
        else
            return redirect()->intended(route('user.dashboard'));
    }

    public function KirimBuktiBayar (Request $r) {
        $r->validate([
            'bukti_bayar' => ['image'],
            'tipe_bayar' => ['required'],
            'id' => 'required|numeric'
        ]);

        $order = order::find($r->id);

        if ($r->hasFile('bukti_bayar')) {
            $Filename = uniqid() . "_" . $r->file('bukti_bayar')->getClientOriginalName(); 
            Storage::putFileAs('/public/Bukti_Bayar/', $r->file('bukti_bayar'), $Filename);
        }

        $bukti_bayar = $order->bukti_bayar()->create ( [
            'id_order' => $order->id,
            'gambar_bukti' => $Filename,
            'terverifikasi' => 0,
        ]);

        $tipe_bayar = tipe_bayar::where('nama', $r->tipe_bayar)->first();
        $order->tipe_bayar()->associate($tipe_bayar);
        
        $order->save();

        return redirect()->intended(route('user.bookingBerjalan'));
    }
}
