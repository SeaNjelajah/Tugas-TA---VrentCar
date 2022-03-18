<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_kartu_keluarga extends Model
{
    use HasFactory;
    protected $table = "tbl_kartu_keluarga";

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
