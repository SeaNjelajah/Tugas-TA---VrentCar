<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_kartu_ktp extends Model
{
    use HasFactory;
    protected $table = "tbl_kartu_ktp";

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
