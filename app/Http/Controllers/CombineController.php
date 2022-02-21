<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\dataSupir;
use Illuminate\Http\Request;
use App\Models\DMobil;
use App\Models\order;
use App\Models\tagContain;
use App\Models\tagList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class CombineController extends Controller
{

    // Own Func / non-related func Start
    private function dataManage($data = [])
    {
        return [
            'header' => 'AdminPage.ZTemplate.header',
            'content' => 'AdminPage.ZTemplate.content', 
            'topnavbar' => 'AdminPage.ZTemplate.topnavbar'
        ];
    }


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


    // Own Func / non-related func End



    //Armada Mobil Section start

    public function showMobil(DMobil $m)
    {
        $data1 = $m->all();
        $data2 = tagList::all();
        $data3 = tagContain::all();

        $view = [
            'header' => 'AdminPage.ArmadaMobil.header',
            'content' => 'AdminPage.ArmadaMobil.content',
            'topnavbar' => 'AdminPage.ArmadaMobil.topnavbar'
        ];

        return view('AdminPage.Combine', compact('data1', 'data2', 'data3'), $view);
    }


    public function createMobil(Request $req)
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

    public function deleteMobil(Request $r)
    {
        $picName = DMobil::find($r->itemId)->gmb_mb;
        $imagePath = public_path('assets/img/dataImg/' . $picName);
        if (File::exists($imagePath) and $picName != 'NoImageA.png') {
            File::delete($imagePath);
        }
        DMobil::find($r->itemId)->delete();
        return redirect(Route('admin.ArmadaMobil.show') . (($r->aftermath != 'r0') ? '#' . $r->aftermath : ''))->with('success', 'Your data has been deleted!');
    }

    public function updateMobil(Request $r)
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
    //Armada Mobil Section end

    //Persewaan Section start
    public function PersewaanShow(Request $r)
    {
        
        $content = [
            'header' => 'AdminPage.Persewaan.header',
            'content' => 'AdminPage.Persewaan.content',
            'topnavbar' => 'AdminPage.Persewaan.topnavbar',
        ];
        
        $data1 = DMobil::all(); $data2 = dataSupir::all(); $data3 = order::all(); 
        return view('AdminPage.Combine', compact('data1', 'data2', 'data3'), $content);
    
    }

    public function CariMobilPersewaan (Request $r) {

        if (!Route::is('CariMobilPersewaan')) return;
        
        //find data in json
        if ($r->dengan_supir == "true") {
            $data = DB::table('d_mobils')->where('tag_mb->Supir', 'Dengan Supir')->get();
        } else if ($r->dengan_supir == "false") {
            $data = DB::table('d_mobils')->where('tag_mb->Supir', 'Tanpa Supir')->get();
        } else {
            return redirect()->back()->withInput()->with("failed", "Something wrong! Try again.");
        }

        
        //$data = DMobil::whereRaw('json_contains(destinations, \'["' . "Dengan Supir" . '"]\')')->get();
        
        $view = [
            'header' => 'AdminPage.Persewaan.TemukanMobilHeader',
            'content' => 'AdminPage.Persewaan.TemukanMobilContent',
            'topnavbar' => 'AdminPage.Persewaan.topnavbar'
        ];
        return view('AdminPage.Combine', compact('data') ,$view);
    }

    public function addPesanan (Request $r) {
        
        $r->session()->flash('failed', 'Some input are empty!');
        
        $r->validate([
            "nama" => ['required'],
            "No_tlp" => ['required'],
            "address_home" => ['required'],
            "total" => ['required'],
            "tipe_bayar" => ['required']
        ]);

        $r->session()->forget('failed');


        if($r->hasFile('GMB_Bukti') && $r->GMB_Bukti != "NoImageA.png") {
            $filename = explode(".", $r->file('GMB_Bukti')->getClientOriginalName())[0] . "_" . time() . '.' . $r->GMB_Bukti->extension();
            $r->file('GMB_Bukti')->move(public_path('assets/img/dataimg/buktibayar'), $filename);
        } else {
            $filename = null;
        }


        if ($r->dengan_supir == "true") {

            $tanggal = Carbon::create (
                $r->tanggal_penjemputan . "T" .
                $r->jam_pejemputan . ":" .
                $r->menit_jam_penjemputan
            );

            order::create([
                "d_mobil_id" => $r->d_mobil_id,
                "nama" => $r->nama,
                "No_tlp" => $r->No_tlp,
                "mulai_sewa" => ($tanggal->toDateTimeLocalString()),
                "akhir_sewa" => ($tanggal->add('day', $r->durasi_sewa)->toDateTimeLocalString()),
                "tipe_sewa" => "Dengan Supir",
                "address_home" => $r->address_home,
                "address_serah_terima" => $r->address_serah_terima,
                "tipe_bayar" => $r->tipe_bayar,
                "total" => $r->total,
                "bukti_bayar" => $filename,
                "status" => "Baru",
                "status_proses" => "Dalam Antrian"
            ]);

        } else if ($r->dengan_supir == "false") {
        

            $tanggal_pengambilan = $r->tanggal_pengambilan."T".$r->jam_pengambilan.":".$r->menit_jam_pengambilan;
            $tanggal_pengembalian = $r->tanggal_pengembalian."T".$r->jam_pengembalian.":".$r->menit_jam_pengembalian;

            order::create([
                "d_mobil_id" => $r->d_mobil_id,
                "nama" => $r->nama,
                "No_tlp" => $r->No_tlp,
                "mulai_sewa" => Carbon::create($tanggal_pengambilan)->toDateTimeLocalString(),
                "akhir_sewa" => Carbon::create($tanggal_pengembalian)->toDateTimeLocalString(),
                "tipe_sewa" => "Tanpa Supir",
                "address_home" => $r->address_home,
                "address_serah_terima" => $r->address_serah_terima,
                "tipe_bayar" => $r->tipe_bayar,
                "total" => $r->total,
                "bukti_bayar" => $filename,
                "status" => "Baru",
                "status_proses" => "Dalam Antrian"
            ]);

        }

        $mobil = DMobil::find($r->d_mobil_id);
        $mobil->status = "Dalam Sewa";
        $mobil->save();

        return redirect(route('admin.Persewaan.show'))->with('success', 'Pesanan berhasil ditambahkan');
    }


    public function OrderSetujui (Request $r, $id) {
        
        $data = order::find($id);

        if (strcmp($data->tipe_sewa , "Dengan Supir") == 0) {
            if (empty($r->data_supir_id) || !is_numeric($r->data_supir_id)) return redirect()->back()->with('failed', 'Please select Driver first!');
            $data->data_supir_id = $r->data_supir_id;

            $supir = dataSupir::find($r->data_supir_id);
            $supir->status = "Dalam Tugas";
            $supir->save();
        }

        
        $data->status = "Dalam Persewaan";
        $data->status_proses = "Disetujui";
        $data->historical_date = json_encode(array_merge(json_decode((empty($data->historical_date)) ? "[]" : $data->historical_date, 1), ['Disetujui' => Carbon::now()->toDateTimeString()]));
        $data->save();
        
        return redirect()->back()->with('success', 'The order has processed');
    }

    public function OrderBatalkan ($id) {
        

        $data = order::find($id);

        $data->status = "Dibatalkan";
        $data->historical_date = json_encode(array_merge(json_decode((empty($data->historical_date)) ? "[]" : $data->historical_date, 1), ['Dibatalkan' => Carbon::now()->toDateTimeString()]));
        $data->save();

        $mobil = DMobil::find($data->d_mobil_id);
        $mobil->status = "Tersedia";
        $mobil->save();

        if (strcmp($data->tipe_sewa , "Dengan Supir") == 0) {
            $supir = dataSupir::find($data->data_supir_id);
            $supir->status = "Dalam Tugas";
            $supir->save();
        }

        return redirect()->back()->with('success', 'The order has canceled');
    }

    //Persewaan Section end

    //Transaksi Section start
    public function TransaksiShow()
    {
        $view = [
            'header' => 'AdminPage.Transaksi.header',
            'content' => 'AdminPage.Transaksi.content',
            'topnavbar' => 'AdminPage.ZTemplate.topnavbar'
        ];

        return view('AdminPage.Combine', $view);
    }

    public function TransaksiTest(Request $r)
    {
        
    }
    //Transaksi Section end

    //TagManage Section Start

    public function tagManageShow()
    {
        $data1 = tagList::all();
        $data2 = tagContain::all();

        $view = [
            'header' => 'AdminPage.TagManage.header',
            'content' => 'AdminPage.TagManage.content'
        ];

        return view('AdminPage.Combine', compact('data1', 'data2'), $view);
    }

    public function TagManageEdit(Request $r)
    {
        $row = tagList::find($r->InputI);
        $name = $row->nama_tag;
        $r->session()->flash('ClickM', $r->modal);
        if ($name == $r->editIn) {
            return redirect()->back()->with('failed', 'Edit data is equal with previous data!');
        } else if (empty($r->editIn)) {
            return redirect()->back()->with('failed', 'Edit field is empty!');
        }
        $r->session()->forget('ClickM');
        $row->nama_tag = $r->editIn;
        $row->save();
        return redirect()->back()->with('success', "editing $name to $row->nama_tag is success");
    }

    public function tagManageTagDel(Request $r)
    {
        $model = tagList::find($r->InputId);
        $name = $model->nama_tag;
        $model->delete();
        return redirect()->back()->with('success', "Tag $name has been deleted!");
    }

    public function tagContainAdd(Request $r, tagList $m)
    {
        $name = $m->find($r->InputId)->nama_tag;
        $r->session()->flash('failed', "Unsuccess for add $r->addTC to Tag $name");
        $r->validate(['addTC' => ['required']]);
        $r->session()->forget('failed');
        $m->find($r->InputId)->TagContain()->create(['contain' => $r->addTC]);
        return redirect()->back()->with('success', "added $r->addTC to Tag $name");
    }

    public function tagManageAdd(Request $r)
    {
        $r->session()->flash('failed', 'failed for add new tag!');
        $r->validate([
            'tb_tag' => ['required', 'unique:App\Models\tagList,nama_tag']
        ], [
            'tb_tag.required' => 'Input Nama Tag Harus di isi!',
            'tb_tag.unique' => 'Nama tag yang dimasukan telah ada!'
        ]);

        $r->session()->forget('failed');
        $insert = new tagList();
        $insert->nama_tag = $r->tb_tag;
        $insert->save();
        return redirect()->back()->with('success', "Tag $r->tb_tag Added!");
    }

    public function tagContainDel(Request $r)
    {
        $name = tagContain::find($r->itemLId)->contain;
        $parId = tagContain::find($r->itemLId)->tag_list_id;
        $namePar = tagList::find($parId)->nama_tag;
        tagContain::find($r->itemLId)->delete();
        return redirect()->back()->with('success', "$name in Tag $namePar have been deleted!");
    }

    public function tagContainEdit(Request $r)
    {
        $row = tagContain::find($r->InputI);
        $name = $row->contain;
        $r->session()->flash('ClickM', $r->modal);
        if ($name == $r->editIn) {
            return redirect()->back()->with('failed', 'Edit data is equal with previous data!');
        } else if (empty($r->editIn)) {
            return redirect()->back()->with('failed', 'Edit field is empty!');
        }
        $r->session()->forget('ClickM');
        $row->contain = $r->editIn;
        $row->save();
        return redirect()->back()->with('success', "editing $name to $row->contain is success");
    }

    //TagManage Section End

    //Supir Manager start

    public function SupirShow()
    {
        $data = dataSupir::all();
        $view = [
            'header' => 'AdminPage.SupirManager.header',
            'content' => 'AdminPage.SupirManager.content'
        ];

        return view('AdminPage.Combine', compact('data'), $view);
    }

    public function SupirAdd(Request $r)
    {

        $r->session()->flash('failed', "unsuccessful! Please fill all inputs!");
        $r->session()->flash('ClickM', $r->modal);

        $r->validate([
            'nm_sp' => ['required'],
            'al_r' => ['required'],
            'n_hp' => ['required', 'numeric'],
            'gaji' => ['required']
        ], [
            'nm_sp.required' => 'Input Nama perlu di isi!',
            'al_r.required' => 'Input Alamat Rumah perlu di isi!',
            'n_hp.required' => 'Input Nomor HP perlu di isi!',
            //'gaji.required' => 'Input Pendapatan Driver / Aksi harus di isi!'
        ]);

        $r->session()->forget(['failed', 'ClickM']);

        if ($r->hasFile('GMB')) {
            $image = explode(".", $r->file('GMB')->getFilename())[0] . "_" . time() . $r->GMB->extension();
            $r->GMB->move(public_path('assets/img/dataImg/'), $image);
        } else {
            $image = 'NoImageA.png';
        }

        dataSupir::create([
            'nama' => $r->nm_sp,
            'gmb_sp' => $image,
            'al_sp' => $r->al_r,
            'no_tlp' => $r->n_hp,
            'gj_sp' => $r->gaji,
            'status' => $r->st_sp
        ]);

        return redirect()->back()->with('success', 'your data added!');
    }

    public function SupirEdit(Request $r)
    {
        $up = dataSupir::find($r->itemSId);

        if ($r->hasFile('GMB')) {
            if ($up->gmb_sp != "NoImageA.png") File::delete(public_path('assets/img/dataImg/') . $up->gmb_sp);
            $image = explode(".", $r->file('GMB')->getFilename())[0] . "_" . time() . $r->GMB->extension();
            $r->GMB->move(public_path('assets/img/dataImg/'), $image);
            $up->gmb_sp = $image;
        }

        $up->nama = ($r->nm_sp == $up->nama) ? $up->nama : $r->nm_sp;
        $up->al_sp = ($r->al_r == $up->al_sp) ? $up->al_sp : $r->al_r;
        $up->status = ($r->st_sp == $up->status) ? $up->status : $r->st_sp;
        $up->no_tlp = ($r->n_hp == $up->no_tlp) ? $up->no_tlp : $r->n_hp;
        //$up->gj_sp = ($r->gaji == $up->gj_sp) ? $up->gj_sp : $r->gaji;
        $up->gj_sp = '150000';

        if ($up->isClean()) {
            return redirect(Route('SupirManager') . "#" . $r->idForScroll)->with("failed", "Inputs aren't change! please edit something!")->with("ClickM", $r->modal)->withErrors(["NotEdited" => "Not detected a change on edit inputs"]);
        } else {
            $up->save();
            return redirect(Route('SupirManager') . "#" . $r->idForScroll)->with("success", "Your data has been edited!");
        }
    }


    public function Supirdelete(Request $r)
    {
        $row = dataSupir::find($r->itemSId);
        if ($row->gmb_sp != 'NoImageA.png') {
            File::delete(public_path('assets/img/dataImg/') . $row->gmb_sp);
        }
        $row->delete();
        return redirect()->back()->with('success', 'your data has been deleted!');
    }

    //Supir Manager end









    //Landing Start

    //Home Start

    public function HomeShow () {
        $data = DMobil::all();
        return view('LandingPage.index', compact('data'));
    }

    //Home end

    //CarList Start

    public function CarListPage()
    {
        $data = DMobil::all();
        return view('LandingPage.CarPage.CarList', compact('data'));
    }

    //CarList End

    //Carlist Single Start

    public function CarSingle(Request $r)
    {
        $data = DMobil::find($r->Id);
        return view('LandingPage.CarPage.CarSingle', compact('data'));
    }

    //Carlist Single Start

    //Landing End
}
