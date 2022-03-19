<?php

namespace App\Exports;

use App\Models\tbl_order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class OrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection($condition = 0, $Start = null, $End = null)
    {   
        $hiddenAtribute = [
            'id_mobil', 'id_supir', 'user_id',
            'id_tipe_bayar', 'id_tipe_sewa'
        ];

        switch ($condition) {
            case 1:
                return tbl_order::all()->makeHidden($hiddenAtribute)->where('status', 'Selesai')->whereBetween('created_at', [$Start, $End]);
                break;
            default:
                return tbl_order::all()->makeHidden($hiddenAtribute)->where('status', 'Selesai');
        };
    }

    public function headings () : array
    {
        return [
            "ID",
            "Status",
            "Penyewa",
            "No Tlp",
            "Durasi Sewa",
            "Tanggal Mulai Sewa",
            "Tanggal Akhir Sewa",
            "Alamat Rumah",
            "Alamat Temu",
            "Total"
        ];
    }
}
