<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\tagContain;
use App\Models\tagList;
use App\Models\tbl_mobil as mobil;
use App\Models\tbl_transmisi as transmisi;
use App\Models\tbl_tipe_sewa as tipe_sewa;
use App\Models\tbl_jenis_mobil as jenis_mobil;

use Illuminate\Support\Facades\File;

class ArmadaMobilController extends Controller
{

    private function Tag_loader($r)
    {
        $m = new tagList();
        $bagName = array_fill_keys(collect($m->all())->pluck('nama_tag')->toArray(), null);
        foreach ($m->all() as $item) {
            if ($r->has($item->nama_tag . "_tag") and $r->get($item->nama_tag . "_tag") != "none") {
                $bagName[$item->nama_tag] = $r->get($item->nama_tag . "_tag");
            }
        }
        return !empty($bagName) ? json_encode(array_filter($bagName)) : null;
    }

    


    public function index()
    {
        $mobil = mobil::all();
        $transmisi = transmisi::all();
        $tipe_sewa = tipe_sewa::all();
        $jenis_mobil = jenis_mobil::all();

        return view('AdminPage.ArmadaMobil.main', compact('mobil', 'transmisi', 'tipe_sewa', 'jenis_mobil'));
    }


    public function create(Request $req)
    {
        $req->session()->flash('failed', "unsuccessful! Please fill all inputs!");
        $req->session()->flash('ClickM', $req->modal);
        $req->validate([
            'nama' => ['required'],
            'jumlah_kursi' => ['required', 'numeric'],
            'tahun' => ['required', 'numeric'],
            'pelat' => ['required'],
            'desc_mb' => ['required'],
            'harga' => ['required'],
            'kapasitas_koper' => ['required', 'numeric'],
            'millage' => ['required', 'numeric'],
        ], [
            'nama.required' => 'Nama Perlu diisi',
            'jumlah_kursi.required' => 'Jumlah Kursi Perlu Di isi!',
            'jumlah_kursi.numeric' => 'Jumlah Kursi Harus Angka!',
            'tahun.required' => 'Tahun Mobil Perlu Di isi!',
            'tahun.numeric' => 'Tahun Mobil Harus Angka!',
            'pelat.required' => 'Pelat Mobil Perlu Di isi!',
            'desc_mb.required' => 'Deskripsi Mobil Perlu Di isi!',
            'kapasitas_koper.required' => 'Bagasi Mobil Perlu Di isi!',
            'kapasitas_koper.numeric' => 'Bagasi Mobil Harus Angka!',
            'millage.required' => 'Millage Mobil Perlu Di isi!',
            'millage.numeric' => 'Millage Mobil Harus Angka!',
        ]);
        
        
        $req->session()->forget(['failed', 'ClickM']);
        

        $imageName = $this->SaveFile($req, 'gambar');

        // id_transmisi
        // id_tipe_sewa
        // id_feature
        // id_jenis_mobil

        $data = $req->except(['gambar','_token','modal','jenis_transmisi','tipe_sewa', 'jenis_mobil']);
        $data = array_merge($data, ["gambar" => $imageName]);


        $mobil = mobil::create($data);

        $transmisi = transmisi::find($req->jenis_transmisi);
        $mobil->transmisi()->associate($transmisi);

        $jenis_sewa = tipe_sewa::find($req->tipe_sewa);
        $mobil->tipe_sewa()->associate($jenis_sewa);

        $jenis_mobil = jenis_mobil::find($req->jenis_mobil);
        $mobil->jenis_mobil()->associate($jenis_mobil);

        $mobil->save();
        
        // mobil::create([
        //     'nama' => $req->nm_mb,
        //     'jumlah_kursi' => $req->jumlah_kursi,
        //     'tahun' => $req->thn_m,
        //     'gambar' => $imageName,
        //     'pelat' => $req->pl_mb,
        //     'desc_mb' => $req->desc_mb,
        //     'harga' => $req->hs_ph,
        //     'kapasitas_koper' => $req->Bagasi,
        //     'millage' => $req->Millage,
        //     'status' => $req->st_mb
        // ]);



        return redirect(Route("admin.ArmadaMobil.show") . (($req->idForScroll != 'r0') ? '#' . $req->idForScroll : ''))->with('success', 'Your Data are saved!');
    }

    public function delete(Request $r)
    {
        $gambar = mobil::find($r->itemId)->gmb_mb;
        $this->DeleteFile($gambar);

        mobil::find($r->itemId)->delete();
        return redirect(Route('admin.ArmadaMobil.show') . (($r->aftermath != 'r0') ? '#' . $r->aftermath : ''))->with('success', 'Your data has been deleted!');
    }

    public function edit(Request $r)
    {

        $r->session()->flash("failed", "Something Wrong! Please fix it!");
        $r->session()->flash('ClickM', $r->modal);

        $prevUrl = $r->session()->previousUrl();
        $r->session()->setPreviousUrl($r->session()->previousUrl() . "/#Card$r->editid");
        
        $r->validateWithBag('editf' . $r->editid, [
            'nama' => ['required'],
            'jumlah_kursi' => ['required', 'numeric'],
            'tahun' => ['required', 'numeric'],
            'pelat' => ['required'],
            'desc_mb' => ['required'],
            'harga' => ['required'],
            'kapasitas_koper' => ['required', 'numeric'],
            'millage' => ['required', 'numeric'],
        ],[
            'nama.required' => 'Nama Perlu diisi',
            'jumlah_kursi.required' => 'Jumlah Kursi Perlu Di isi!',
            'jumlah_kursi.numeric' => 'Jumlah Kursi Harus Angka!',
            'tahun.required' => 'Tahun Mobil Perlu Di isi!',
            'tahun.numeric' => 'Tahun Mobil Harus Angka!',
            'pelat.required' => 'Pelat Mobil Perlu Di isi!',
            'desc_mb.required' => 'Deskripsi Mobil Perlu Di isi!',
            'kapasitas_koper.required' => 'Bagasi Mobil Perlu Di isi!',
            'kapasitas_koper.numeric' => 'Bagasi Mobil Harus Angka!',
            'millage.required' => 'Millage Mobil Perlu Di isi!',
            'millage.numeric' => 'Millage Mobil Harus Angka!',
        ]);

        $r->session()->forget(['failed', 'ClickM']);


        $r->session()->setPreviousUrl($prevUrl);
        
        $up = mobil::find($r->editid);
        if ($r->hasFile('gambar')) {

            $imageName = $this->SaveFile($r,'gambar');
            
            if ($up->gmb_mb != 'NoImage.jpg') {
                $this->DeleteFile($up->gmb_mb);
            }

        } else {
            $imageName = $up->gambar;
        }

        
        $up->gambar = $up->gambar != $imageName ? $imageName : $up->gambar;
        $up->nama = $up->nama != $r->nama ? $r->nama : $up->nama;
        $up->jumlah_kursi = $up->jumlah_kursi != $r->jumlah_kursi ? $r->jumlah_kursi : $up->jumlah_kursi;
        $up->tahun = $up->tahun != $r->tahun ? $r->tahun : $up->tahun;
        $up->pelat = $up->pelat != $r->pelat ? $r->pelat : $up->pelat;
        $up->desc_mb = $up->desc_mb != $r->desc_mb ? $r->desc_mb : $up->desc_mb;
        $up->status = $up->status != $r->status ? $r->status : $up->status;
        $up->harga = $up->harga != $r->harga ?  $r->harga : $up->harga;
        $up->millage = $up->millage != $r->millage ?  $r->millage : $up->millage;
        $up->kapasitas_koper = $up->kapasitas_koper != $r->kapasitas_koper ?  $r->kapasitas_koper : $up->kapasitas_koper;

        if ($up->id_transmisi != $r->jenis_transmisi)  {
            $transmisi = transmisi::find($r->jenis_transmisi);
            $up->transmisi()->associate($transmisi);
        }

        if ($up->tipe_sewa != $r->jenis_transmisi)  {
            $jenis_sewa = tipe_sewa::find($r->tipe_sewa);
            $up->tipe_sewa()->associate($jenis_sewa);
        }

        if ($up->id_jenis_mobil != $r->jenis_transmisi)  {
            $jenis_mobil = jenis_mobil::find($r->jenis_mobil);
            $up->jenis_mobil()->associate($jenis_mobil);
        }

        
        if ($up->isClean()) {
            return redirect(Route('admin.ArmadaMobil.show') . "#" . $r->idForScroll)->with("failed", "Inputs aren't change! please edit something!")->with("ClickM", $r->modal)->withErrors(["NotEdited" => "Not detected a change on edit inputs"]);
        } else {
            $up->save();
            return redirect(Route('admin.ArmadaMobil.show') . "#" . $r->idForScroll)->with("success", "Your data has been edited!");
        }
    }
}
