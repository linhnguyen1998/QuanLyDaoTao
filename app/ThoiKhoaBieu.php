<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThoiKhoaBieu extends Model
{
    protected $table = "thoikhoabieu";
    public $primaryKey = "id_tkb";
    public $timestamps = false;
    public $incrementing = false;

    public function giangvien()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien', 'id_giangvien');
    }

    public function hocky()
    {
        return $this->belongsTo('App\HocKy', 'id_hocky', 'id_hocky');
    }

    public function lop()
    {
        return $this->belongsTo('App\Lop', 'id_lop', 'id_lop');
    }
    public function phongmay()
    {
        return $this->belongsTo('App\PhongMay', 'id_phong', 'id_phong');
    }
    public function dangky()
    {
        return $this->hasMany('App\DangKy', 'id_tkb', 'id_tkb');
    }
}
