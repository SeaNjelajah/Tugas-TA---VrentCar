<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_feature extends Model
{
    use HasFactory;
    protected $table = 'tbl_feature';

    protected $guarded = ['id'];
}
