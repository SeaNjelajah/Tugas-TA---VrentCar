<?php

namespace App\Exports;

use App\Models\tbl_order;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;


class OrdersAllExport implements FromQuery, WithHeadings, WithMapping
{
    
    /**
    * @return \Illuminate\Support\query
    */
    public function query()
    {   
        return tbl_order::where('status', 'Selesai')->orderBy('id', 'asc');
    }

    public function map($order): array
    {

        $totalDenda = $order->denda()->get()->sum('denda');
        $hargaPerHari = $order->mobil()->first()->harga;

        if ($totalDenda == 0) {
            $totalDenda = "0";
        }

        if ($order->supir()->exists()) {
            $supir = "150000";
        } else {
            $supir = "0";
        }

        return [
            $order->id, $order->status, $order->penyewa,
            $order->No_tlp, $order->tgl_mulai_sewa, 
            $order->tgl_akhir_sewa, $order->alamat_rumah,
            $order->alamat_temu, $supir, $totalDenda,
            $hargaPerHari, $order->durasi_sewa . " Hari",
            $order->total,
        ];
    }


    public function headings () : array
    {
        return [
            "ID",
            "Status",
            "Penyewa",
            "No Tlp",
            "Tanggal Mulai Sewa",
            "Tanggal Akhir Sewa",
            "Alamat Rumah",
            "Alamat Temu",
            "Biaya Supir",
            "Denda",
            "Harga / Hari",
            "Durasi",
            "Total"
        ];
    }
}
