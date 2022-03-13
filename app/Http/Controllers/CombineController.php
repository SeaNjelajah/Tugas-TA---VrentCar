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

    
    //Armada Mobil Section end

    //Persewaan Section start
    

    //Persewaan Section end

    //Transaksi Section start
    public function TransaksiShow()
    {
        $view = [
            'header' => 'AdminPage.Transaksi.header',
            'content' => 'AdminPage.Transaksi.content',
           
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

    
    //Landing End
}
