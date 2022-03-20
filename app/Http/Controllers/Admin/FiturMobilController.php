<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_feature;
use App\Models\tbl_jenis_mobil;
use App\Models\tbl_merek;
use App\Models\tbl_transmisi;
use Illuminate\Http\Request;

class FiturMobilController extends Controller
{
    public function index (Request $r) {

        if (!empty($r->search_merek)) {
            $mereks = tbl_merek::where('merek', 'like', '%'.$r->search_merek.'%')->get();
        } else {
            $mereks = tbl_merek::all();
        }

        if (!empty($r->search_jenis_mobil)) {
            $jenis_mobils = tbl_jenis_mobil::where('jenis_mobil', 'like', '%'.$r->search_jenis_mobil.'%')->get();
        } else {
            $jenis_mobils = tbl_jenis_mobil::all();
        }

        if (!empty($r->search_jenis_transmisi)) {
            $jenis_transmisis = tbl_transmisi::where('nama_transmisi', 'like', '%'.$r->search_jenis_transmisi.'%')->get();
        } else {
            $jenis_transmisis = tbl_transmisi::all();
        }

        if (!empty($r->search_feature)) {
            $features = tbl_feature::where('nama_feature', 'like', '%'.$r->search_feature.'%')->get();
        } else {
            $features = tbl_feature::all();
        }

        return view('AdminPage.FiturMobil.main', compact('mereks', 'jenis_mobils', 'jenis_transmisis', 'features'));
    }
}
