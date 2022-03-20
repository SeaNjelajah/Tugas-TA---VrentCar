<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class tbl_mobil extends Model
{
    use HasFactory, Searchable;

    protected $table = 'tbl_mobil';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function transmisi () {
        return $this->belongsTo(tbl_transmisi::class, 'id_transmisi');
    }

    public function tipe_sewa () {
        return $this->belongsTo(tbl_tipe_sewa::class, 'id_tipe_sewa');
    }

    public function feature () {
        return $this->belongsToMany(tbl_feature::class, 'id_feature');
    }

    public function jenis_mobil () {
        return $this->belongsTo(tbl_jenis_mobil::class, 'id_jenis_mobil');
    }

    public function merek () {
        return $this->belongsTo(tbl_merek::class, 'id_merek');
    }

}
