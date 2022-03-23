<?php

namespace App\Exports;

use App\Models\tbl_order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Database\Query\Builder;
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

        $Model = tbl_order::find($order->id);
        $totalDenda = $Model->denda()->get()->sum('denda');
        $hargaPerHari = $Model->mobil()->first()->harga;

        if ($totalDenda == 0) {
            $totalDenda = "0";
        }

        return [
            $order->id, $order->status, $order->penyewa,
            $order->No_tlp, $order->tgl_mulai_sewa, 
            $order->tgl_akhir_sewa, $order->alamat_rumah,
            $order->alamat_temu, $hargaPerHari,
            strval($order->durasi_sewa) . " Hari",
            $totalDenda, $order->total
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
            "Harga / Hari",
            "Durasi",
            "Denda",
            "Total"
        ];
    }
}
