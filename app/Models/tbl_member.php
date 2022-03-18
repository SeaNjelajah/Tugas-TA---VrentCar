<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_member extends Model
{
    use HasFactory;
    protected $table = 'tbl_member';
    
    public function sim_a  () {
        return $this->hasOne(tbl_sim_a::class, 'member_id');
    }

    public function kartu_keluarga () {
        return $this->hasOne(tbl_kartu_keluarga::class, 'member_id');
    }

    public function ktp () {
        return $this->hasOne(tbl_kartu_ktp::class, 'member_id');
    }

}
