<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_sim_a extends Model
{
    use HasFactory;
    protected $table = "tbl_sim_a";

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
