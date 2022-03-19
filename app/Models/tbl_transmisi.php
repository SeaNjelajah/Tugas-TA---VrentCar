<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_transmisi extends Model
{
    use HasFactory;
    protected $table = 'tbl_transmisi';

    protected $guarded = ["id"];

    public $timestamps = false;
}
