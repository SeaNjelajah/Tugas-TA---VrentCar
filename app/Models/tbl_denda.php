<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_denda extends Model
{
    use HasFactory;
    protected $table = 'tbl_denda';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
