<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tagContain;
use App\Models\tagList;
use App\Models\DMobil;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller {
    
    // data definition shortcut
    private function ds (
        $header = 'AdminPage.ZTemplate.header',
        $content = 'AdminPage.ZTemplate.content', 
        $topnavbar = 'AdminPage.ZTemplate.topnavbar'
    ) {
        return [
            'header' => $header,
            'content' => $content,
            'topnavbar' => $topnavbar
        ];
    }

    

    public function Dashboard () {
        if (!Route::is('admin.dashboard.show'))
            return;

        return view('AdminPage.Combine',
        $this->ds(
            'AdminPage.Dashboard.header',
            'AdminPage.Dashboard.content',
            'AdminPage.Dashboard.topnavbar'
            )
        );
    }

    public function ArmadaMobilShow () {
        if (!Route::is('admin.ArmadaMobil.show'))
            return;

        $data1 = DMobil::all();
        $data2 = tagList::all();
        $data3 = tagContain::all();

        return view('AdminPage.Combine', compact('data1', 'data2', 'data3'),
        $this->ds(
            'AdminPage.ArmadaMobil.header',
            'AdminPage.ArmadaMobil.content',
            'AdminPage.ArmadaMobil.topnavbar'
            )
        );

    }

    public function ArmadaMobilCreate(Request $r) {
        if (!Route::is('admin.ArmadaMobil.create'))
            return;

        $r->session()->flash('failed', "unsuccessful! Please fill all inputs!");
        
        $r->session()->flash('ClickM', $r->modal);
        $r->validate([
            'nm_mb' => ['required'],
            'jtd' => ['required', 'numeric'],
            'thn_m' => ['required', 'numeric'],
            'pl_mb' => ['required'],
            'desc_mb' => ['required'],
            'hs_ph' => ['required'],
            'Bagasi' => ['required', 'numeric'],
            'Millage' => ['required', 'numeric'],
        ], [
            'nm_mb.required' => 'Nama Perlu diisi',
            'jtd.required' => 'Jumlah Kursi Perlu Di isi!',
            'jtd.numeric' => 'Jumlah Kursi Harus Angka!',
            'thn_m.required' => 'Tahun Mobil Perlu Di isi!',
            'thn_m.numeric' => 'Tahun Mobil Harus Angka!',
            'pl_mb.required' => 'Pelat Mobil Perlu Di isi!',
            'desc_mb.required' => 'Deskripsi Mobil Perlu Di isi!',
            'Bagasi.required' => 'Bagasi Mobil Perlu Di isi!',
            'Bagasi.numeric' => 'Bagasi Mobil Harus Angka!',
            'Millage.required' => 'Millage Mobil Perlu Di isi!',
            'Millage.numeric' => 'Millage Mobil Harus Angka!',
        ]);
        /*
            Proses
        */
        $r->session()->forget(['failed', 'ClickM']);
        if ($r->hasFile('GMB')) {
            $imageName = explode(".", $r->file('GMB')->getFilename())[0] . "_" . time() . '.' . $r->GMB->extension();
            $r->GMB->move(public_path('assets/img/dataImg'), $imageName);
        } else {
            $imageName = 'noImageA.png';
        }

        DMobil::create([
            'nama_mb' => $r->nm_mb,
            'jml_tp_d' => $r->jtd,
            't_mb' => $r->thn_m,
            'gmb_mb' => $imageName,
            'plat_mb' => $r->pl_mb,
            'tag_mb' => $this->Tag_loader($r),
            'desc_mb' => $r->desc_mb,
            'harga_mb' => $r->hs_ph,
            'bagasi' => $r->Bagasi,
            'millage' => $r->Millage,
            'status' => $r->st_mb
        ]);
        return redirect(Route("ArmadaMobil") . (($r->idForScroll != 'r0') ? '#' . $r->idForScroll : ''))->with('success', 'Your Data are saved!');
    }

    public function PersewaanCreatePenyelesaian (Request $r) {
        
        $data = DMobil::all();
        
        $view = [
            'header' => 'AdminPage.Persewaan.PenyelesaianCreatePesananHeader',
            'content' => 'AdminPage.Persewaan.PenyelesaianCreatePesananContent'
        ];

        return view('AdminPage.Combine', compact('data'), $view);
    }


    
}

?>