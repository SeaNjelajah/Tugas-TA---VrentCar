<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_order extends Model
{
    use HasFactory;
    protected $table = 'tbl_order';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function mobil () {
       return $this->BelongsTo(tbl_mobil::class, 'id_mobil');
    }

    public function supir () {
        return $this->BelongsTo(tbl_supir::class, 'id_supir');
    }

    public function user () {
        return $this->BelongsTo(User::class);
    }

    public function tipe_bayar () {
        return $this->BelongsTo(tbl_tipe_bayar::class, 'id_tipe_bayar');
    }

    public function tipe_sewa () {
        return $this->belongsTo(tbl_tipe_sewa::class, 'id_tipe_sewa');
    }

    

    public function bukti_bayar () {
        return $this->hasMany(tbl_buktibayar::class, 'id_order');
    }

    public function riwayat () {
        return $this->hasMany(tbl_tgl_riwayat::class, 'id_order');
    }

    public function status_order () {
        return $this->hasMany(tbl_status_order::class, 'id_order');
    }

    public function denda () {
        return $this->hasMany(tbl_denda::class, 'id_order');
    }

}
