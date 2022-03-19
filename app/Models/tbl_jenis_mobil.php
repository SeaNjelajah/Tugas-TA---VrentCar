<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_jenis_mobil extends Model
{
    use HasFactory;
    protected $table = 'tbl_jenis_mobil';

    protected $guarded = ["id"];
}
