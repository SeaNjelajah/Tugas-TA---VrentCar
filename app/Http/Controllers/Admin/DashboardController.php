<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_order;
use App\Models\tbl_post;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller {

    public function Dashboard () {

        $PesananBaru = tbl_order::where('status', 'Baru')->count();
        $DalamPersewaan = tbl_order::where('status', 'Dalam Persewaan')->count();
        $PesananSelesai = tbl_order::where('status', 'Selesai')->count();

        $orders = tbl_order::latest()->limit(10)->get();
        $users = User::latest()->limit(10)->get();

        $now = Carbon::now();
        $Start = $now->startOf('month')->toDateTimeLocalString();
        $End = $now->EndOf('month')->toDateTimeLocalString();
        $Pendapatan = tbl_order::where('status', 'Selesai')->whereBetween('created_at', [$Start, $End])->sum('total');

    
        return view('AdminPage.Dashboard.main', compact('PesananBaru', 'DalamPersewaan', 'PesananSelesai', 'orders', 'users', 'Pendapatan'));
    }

}
