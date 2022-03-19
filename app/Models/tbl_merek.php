<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_merek extends Model
{
    use HasFactory;

    protected $table = "tbl_merek_mobil";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
