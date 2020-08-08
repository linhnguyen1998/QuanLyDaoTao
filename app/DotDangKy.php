<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DotDangKy extends Model
{
    protected $table = "dotdangky";
    public $timestamps = false;

    public function hocky()
    {
        return $this->belongsTo('App\HocKy', 'id_hocky', 'id_hocky');
    }
}
