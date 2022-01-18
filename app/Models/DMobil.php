<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMobil extends Model
{
    use HasFactory;
    protected $table = 'd_mobils';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
