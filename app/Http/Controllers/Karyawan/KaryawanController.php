<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\tbl_order as order;
use Illuminate\Http\Request;



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
}
