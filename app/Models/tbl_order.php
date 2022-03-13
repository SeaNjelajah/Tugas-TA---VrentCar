<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function denda () {
        return $this->belongsToMany(tbl_denda::class, 'id_denda');
    }

    public function tipe_bayar () {
        return $this->BelongsTo(tbl_tipe_bayar::class, 'id_tipe_bayar');
    }

    public function status_order () {
        return $this->belongsToMany(tbl_status_order::class, 'id_status_order');
    }

    public function bukti_bayar () {
        return $this->belongsToMany(tbl_buktibayar::class, 'id_bukti_bayar');
    }

}
