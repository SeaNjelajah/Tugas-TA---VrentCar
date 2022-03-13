<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_mobil as mobil;

class tbl_tipe_sewa extends Model
{
    use HasFactory;
    protected $table = 'tbl_tipe_sewa';

    public function mobil () {
        return $this->hasMany(mobil::class, 'id_tipe_sewa');
    }

}
