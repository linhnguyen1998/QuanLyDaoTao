<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = "lop";
    public $primaryKey = "id_lop";
    public $timestamps = false;

    public function hocphan()
    {
        return $this->belongsTo('App\HocPhan', 'id_hocphan', 'id_hocphan');
    }

    public function thoikhoabieu()
    {
        return $this->hasMany('App\ThoiKhoaBieu', 'id_lop', 'id_lop');
    }
}
