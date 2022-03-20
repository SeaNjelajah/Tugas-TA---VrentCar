<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\tbl_order as order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    public function index () {
        return view ('KaryawanPage.Dashboard.main');
    }

    public function update_status_order (Request $r) {
        $order = order::find($r->id);

        $order->status_order()->create([
            'status' => $r->status,
            'created_at' => now()->toDateTimeLocalString()
        ]);

        return redirect()->back()->with('success', 'status order updated!');
    }

    public function Update_Karyawan (Request $r) {
        $r->validate([
            'nama_lengkap' => 'required',
            'alamat_rumah' => 'required',
            'no_tlp' => 'required|numeric',
            'umur' => 'required|numeric',
        ]);

        $user = User::find(Auth::user()->id);

        $karyawanData = $r->only('nama_lengkap' ,'alamat_rumah', 'no_tlp', 'umur');
        
        if ($r->hasFile('foto_diri')) {

            $CurrentImage = (empty($user->karyawan()->first()->foto_diri)) ? 'NoImageA.png' :$user->karyawan()->first()->foto_diri;
            $Imagename = $this->SaveFile($r, 'foto_diri', 'assets/img/foto-diri/', $CurrentImage);
            $this->DeleteFile($CurrentImage, 'assets/img/foto-diri/', 'NoImageA.png');

            $foto_diri = [
                'foto_diri' => $Imagename
            ];

            $karyawanData = array_merge($karyawanData, $foto_diri);
        }
        
        $karyawanM = $user->karyawan()->first() or false;

        if ($karyawanM) {
            $karyawanM->update($karyawanData);
        } else {
            $user->karyawan()->create($karyawanData);
        }

        return redirect()->back()->with('success', 'perubahan berhasi!');
    }
}
