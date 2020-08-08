<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangKy extends Model
{
    protected $table = "dangky";
    public $timestamps = false;

    public function sinhvien()
    {
        return $this->belongsTo('App\SinhVien', 'mssv', 'mssv');
    }

    public function hocky()
    {
        return $this->belongsTo('App\HocKy', 'id_hocky', 'id_hocky');
    }
    public function thoikhoabieu()
    {
        return $this->belongsTo('App\ThoiKhoaBieu', 'id_tkb', 'id_tkb');
    }
}
