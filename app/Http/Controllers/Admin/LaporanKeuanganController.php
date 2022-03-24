<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersAllExport;
use App\Exports\OrdersCurrentlyExport;

use App\Http\Controllers\Controller;
use App\Models\tbl_order as order;
use App\Models\tbl_order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanKeuanganController extends Controller
{
    public function index (Request $r) {

        if (!$r->between == "all") {

            if (!empty($r->mulai_sewa) and !empty($r->akhir_sewa)) {
    
                $Start = Carbon::create($r->mulai_sewa)->toDateTimeLocalString();
                $End = Carbon::create($r->akhir_sewa)->toDateTimeLocalString();
    
            } else {
    
                if (!empty($r->between)) {
                    $between = $r->between;
                } else {
                    $between = "week";
                }
    
                $now = Carbon::now();
    
                $Start = $now->startOf($between)->toDateTimeLocalString();
                $End = $now->EndOf($between)->toDateTimeLocalString();
            }
            
            $data = order::where('status', 'Selesai')->whereBetween('created_at', [$Start, $End]);
            
            $total = $data->sum('total');
            $orders = $data->get();

        } else {

            $orders = order::all();
            $total = $orders->sum('total');

        }


        return view('AdminPage.LaporanKeuangan.main', compact('orders', 'total'));
    }

    public function GetLaporan (Request $r) {
        
        

        if (!empty($r->mulai_sewa) and !empty($r->akhir_sewa)) {

            $Start = Carbon::create($r->mulai_sewa)->toDateTimeLocalString();
            $End = Carbon::create($r->akhir_sewa)->toDateTimeLocalString();

            $FileName = Carbon::create($r->mulai_sea)->toDateString() . " - " .
                        Carbon::create($r->akhir_sewa)->toDateString() . 
                        " Order Data";

        } else {

            if (!empty($r->between)) {

                if ($r->between == "all") {
                    $FileName = time() . " All Order Data.csv";
                    return Excel::download(new OrdersAllExport, $FileName);  
                }

                $between = $r->between;
            } else {
                $between = "week";
            }

          
            $now = Carbon::now();
            $Start = $now->startOf($between)->toDateTimeLocalString();            
            $End = $now->EndOf($between)->toDateTimeLocalString();

            $FileName = $now->EndOf($between)->toDateString() . " - " .
                        $now->startOf($between)->toDateString() . " A " .
                        $between . " Order Data";
            
        }

        $orders = tbl_order::where('status', 'Selesai')->whereBetween('created_at', [$Start, $End]);

        return Excel::download(new OrdersCurrentlyExport($orders), $FileName . ".csv");

    }
}
