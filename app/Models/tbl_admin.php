<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_admin extends Model
{
    use HasFactory;
    protected $table = 'tbl_admin';
    protected $guarded = ['id'];
}
