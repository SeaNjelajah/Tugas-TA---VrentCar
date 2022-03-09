<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\tagContain;
use App\Models\tagList;
use App\Models\DMobil;
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
        $data1 = DMobil::all();
        $data2 = tagList::all();
        $data3 = tagContain::all();

        $view = [
            'header' => 'AdminPage.ArmadaMobil.header',
            'content' => 'AdminPage.ArmadaMobil.content',
        ];

        return view('AdminPage.Combine', compact('data1', 'data2', 'data3'), $view);
    }


    public function create(Request $req)
    {
        $req->session()->flash('failed', "unsuccessful! Please fill all inputs!");
        $req->session()->flash('ClickM', $req->modal);
        $req->validate([
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
        $req->session()->forget(['failed', 'ClickM']);
        if ($req->hasFile('GMB')) {
            $imageName = explode(".", $req->file('GMB')->getFilename())[0] . "_" . time() . '.' . $req->GMB->extension();
            $req->GMB->move(public_path('assets/img/dataImg'), $imageName);
        } else {
            $imageName = 'noImageA.png';
        }

        DMobil::create([
            'nama_mb' => $req->nm_mb,
            'jml_tp_d' => $req->jtd,
            't_mb' => $req->thn_m,
            'gmb_mb' => $imageName,
            'plat_mb' => $req->pl_mb,
            'tag_mb' => $this->Tag_loader($req),
            'desc_mb' => $req->desc_mb,
            'harga_mb' => $req->hs_ph,
            'bagasi' => $req->Bagasi,
            'millage' => $req->Millage,
            'status' => $req->st_mb
        ]);
        return redirect(Route("admin.ArmadaMobil.show") . (($req->idForScroll != 'r0') ? '#' . $req->idForScroll : ''))->with('success', 'Your Data are saved!');
    }

    public function delete(Request $r)
    {
        $picName = DMobil::find($r->itemId)->gmb_mb;
        $imagePath = public_path('assets/img/dataImg/' . $picName);
        if (File::exists($imagePath) and $picName != 'NoImageA.png') {
            File::delete($imagePath);
        }
        DMobil::find($r->itemId)->delete();
        return redirect(Route('admin.ArmadaMobil.show') . (($r->aftermath != 'r0') ? '#' . $r->aftermath : ''))->with('success', 'Your data has been deleted!');
    }

    public function edit(Request $r)
    {
        $r->session()->flash("failed", "Something Wrong! Please fix it!");
        $r->session()->flash('ClickM', $r->modal);
        $prevUrl = $r->session()->previousUrl(); $r->session()->setPreviousUrl($r->session()->previousUrl() . "/#Card$r->editid");
        $r->validateWithBag('editf' . $r->editid, [
            'nm_mb' => ['required'],
            'jtd' => ['required', 'numeric'],
            'thn_m' => ['required', 'numeric'],
            'pl_mb' => ['required'],
            'desc_mb' => ['required'],
            'hs_ph' => ['required'],
            'Bagasi' => ['required', 'numeric'],
            'Millage' => ['required', 'numeric'],
        ],[
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

        $r->session()->forget(['failed', 'ClickM']);
        $r->session()->setPreviousUrl($prevUrl);
        
        $up = DMobil::find($r->editid);
        if (!empty($r->GMB) && $r->hasFile('GMB')) {
            $imageName = explode(".", $r->file('GMB')->getFilename())[0] . "_" . time() . '.' . $r->GMB->extension();
            $r->GMB->move(public_path('assets/img/dataImg'), $imageName);
            if ($up->gmb_mb != 'NoImage.jpg') {
                File::delete(public_path('assets/img/dataImg/' . $up->gmb_mb));
            }
        } else {
            $imageName = $up->gmb_mb;
        }

        $up->gmb_mb = $up->gmb_mb != $imageName ? $imageName : $up->gmb_mb;
        $up->nama_mb = $up->nama_mb != $r->nm_mb ? $r->nm_mb : $up->nama_mb;
        $up->jml_tp_d = $up->jml_tp_d != $r->jtd ? $r->jtd : $up->jml_tp_d;
        $up->t_mb = $up->t_mb != $r->thn_m ? $r->thn_m : $up->t_mb;
        $up->plat_mb = $up->plat_mb != $r->pl_mb ? $r->pl_mb : $up->plat_mb;
        $up->tag_mb = $up->tag_mb != $this->Tag_loader($r) ? $this->Tag_loader($r) : $up->tag_mb;
        $up->desc_mb = $up->desc_mb != $r->desc_mb ? $r->desc_mb : $up->desc_mb;
        $up->status = $up->status != $r->st_mb ? $r->st_mb : $up->status;
        $up->harga_mb = $up->harga_mb != $r->hs_ph ?  $r->hs_ph : $up->harga_mb;
        $up->millage = $up->millage != $r->Millage ?  $r->Millage : $up->millage;
        $up->bagasi = $up->bagasi != $r->Bagasi ?  $r->Bagasi : $up->bagasi;

        if ($up->isClean()) {
            return redirect(Route('admin.ArmadaMobil.show') . "#" . $r->idForScroll)->with("failed", "Inputs aren't change! please edit something!")->with("ClickM", $r->modal)->withErrors(["NotEdited" => "Not detected a change on edit inputs"]);
        } else {
            $up->save();
            return redirect(Route('admin.ArmadaMobil.show') . "#" . $r->idForScroll)->with("success", "Your data has been edited!");
        }
    }
}
