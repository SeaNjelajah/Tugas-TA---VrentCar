<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_status_order extends Model
{
    use HasFactory;
    protected $table = 'tbl_status_order';
    protected $guarded = ['id', 'created_at'];

    public $timestamps = false;
}
