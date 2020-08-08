<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = "sinhvien";
    public $primaryKey = "mssv";
    public $timestamps = false;

    public function dangky()
    {
        return $this->hasMany('App\DangKy', 'mssv', 'mssv');
    }
}
