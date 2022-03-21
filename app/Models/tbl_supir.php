<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_supir extends Model
{
    use HasFactory;
    protected $table = 'tbl_supir';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order () {
        return $this->hasMany(tbl_order::class, 'id_supir');
    }
}
