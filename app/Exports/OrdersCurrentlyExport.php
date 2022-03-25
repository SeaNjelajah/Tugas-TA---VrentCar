<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Database\Eloquent\Builder;
class OrdersCurrentlyExport implements FromQuery, WithHeadings, WithMapping
{
    protected Builder $orders;
    public function __construct(Builder $data)
    {
        $this->orders = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {   
        return $this->orders->orderBy('id', 'asc');
    }

    public function map($order): array
    {   

        $totalDenda = $order->denda()->get()->sum('denda');
        $hargaPerHari = $order->mobil()->first()->harga;
        
        $supir = $order->supir()->first() or false;
       
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
            $order->total
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
            "Total",
        ];
    }
}
