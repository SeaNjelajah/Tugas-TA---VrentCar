<?php

namespace App\Http\Controllers;

use App\Models\tbl_order as order;
use App\Models\tbl_tipe_bayar as tipe_bayar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserPageController extends Controller
{
    public function DashboardPage () {
        return view('LandingPage.AccountPage.Dashboard');
    }

    public function BookingBerjalanPage () {
        return view('LandingPage.AccountPage.BookingBerjalan');
    }

    public function RiwayatBokingPage()
    {
        return view('LandingPage.AccountPage.RiwayatBooking');
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

        $tipe_bayar = tipe_bayar::where('nama', $r->tipe_bayar)->first();
        $order->tipe_bayar()->associate($tipe_bayar);
        $order->save();

        return redirect()->intended(route('user.bookingBerjalan'));
    }

    public function KirimKtp (Request $r) {

        $r->validate([
            'ktp' => ['image'],
        ]);

        $ImageInputName = "ktp";
        $user = User::find(Auth::user()->id);

        $punya_data_member = $user->member()->first() or false;

        if (!$punya_data_member) {
            $member = $user->member()->create([]);
        } else {
            $member = $user->member()->first();
        }
       

        if ($r->hasFile($ImageInputName)) {

            $punya_ktp = $member->ktp()->first() or false;
            
            if ($punya_ktp) {
                
                $CurrentKtp = $member->ktp()->first()->kartu_ktp;
                
                if (Storage::exists('/public/' . $ImageInputName .'/' . $CurrentKtp))
                Storage::delete('/public/' . $ImageInputName . '/' . $CurrentKtp);
                
            }
            
            $Filename = uniqid() . "_" . $r->file($ImageInputName)->getClientOriginalName(); 
            Storage::putFileAs('/public/' . $ImageInputName . '/', $r->file($ImageInputName), $Filename);


            if ($punya_ktp) {

                $ktp = $member->ktp()->first();

                $ktp->update([
                    'kartu_ktp' => $Filename,
                    'terverifikasi' => null
                ]);

            } else {

                $member->ktp()->create([
                    'kartu_ktp' => $Filename,
                ]);

            }

        }

        return redirect()->intended(route('user.bookingBerjalan'));

    }
    public function KirimKartuKeluarga (Request $r) {

        $r->validate([
            'kartu_keluarga' => ['image'],
        ]);

        $ImageInputName = "kartu_keluarga";

        $user = User::find(Auth::user()->id);

        $punya_data_member = $user->member()->first() or false;

        if (!$punya_data_member) {
            $member = $user->member()->create([]);
        } else {
            $member = $user->member()->first();
        }
       

        if ($r->hasFile($ImageInputName)) {

            $punya_kartu_keluarga = $member->kartu_keluarga()->first() or false;
            
            if ($punya_kartu_keluarga) {
                
                $Currentkartu_keluarga = $member->kartu_keluarga()->first()->kartu_keluarga;
                
                if (Storage::exists('/public/' . $ImageInputName .'/' . $Currentkartu_keluarga))
                Storage::delete('/public/' . $ImageInputName . '/' . $Currentkartu_keluarga);
                
            }
            
            $Filename = uniqid() . "_" . $r->file($ImageInputName)->getClientOriginalName(); 
            Storage::putFileAs('/public/' . $ImageInputName . '/', $r->file($ImageInputName), $Filename);


            if ($punya_kartu_keluarga) {

                $kartu_keluarga = $member->kartu_keluarga()->first();

                $kartu_keluarga->update([
                    'kartu_keluarga' => $Filename,
                    'terverifikasi' => null
                ]);

            } else {

                $member->kartu_keluarga()->create([
                    'kartu_keluarga' => $Filename,
                ]);

            }

        }

        return redirect()->intended(route('user.bookingBerjalan'));

    }
    public function KirimSimA (Request $r) {

        $r->validate([
            'sim_a' => ['image'],
        ]);

        $ImageInputName = "sim_a";
        $user = User::find(Auth::user()->id);

        $punya_data_member = $user->member()->first() or false;

        if (!$punya_data_member) {
            $member = $user->member()->create([]);
        } else {
            $member = $user->member()->first();
        }
       

        if ($r->hasFile($ImageInputName)) {

            $punya_sim_a = $member->sim_a()->first() or false;
            
            if ($punya_sim_a) {
                
                $Currentsim_a = $member->sim_a()->first()->sim_a;
                
                if (Storage::exists('/public/' . $ImageInputName .'/' . $Currentsim_a))
                Storage::delete('/public/' . $ImageInputName . '/' . $Currentsim_a);
                
            }
            
            $Filename = uniqid() . "_" . $r->file($ImageInputName)->getClientOriginalName(); 
            Storage::putFileAs('/public/' . $ImageInputName . '/', $r->file($ImageInputName), $Filename);


            if ($punya_sim_a) {

                $sim_a = $member->sim_a()->first();

                $sim_a->update([
                    'sim_a' => $Filename,
                    'terverifikasi' => null
                ]);

            } else {

                $member->sim_a()->create([
                    'sim_a' => $Filename,
                ]);

            }

        }

        return redirect()->intended(route('user.bookingBerjalan'));

    }

}
