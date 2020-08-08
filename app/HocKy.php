<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
    protected $table = "hocky";
    public $primaryKey = "id_hocky";
    public $timestamps = false;

    public function dangky()
    {
        return $this->hasMany('App\DangKy', 'id_hocky', 'id_hocky');
    }

    public function thoikhoabieu()
    {
        return $this->hasMany('App\ThoiKhoaBieu', 'id_hocky', 'id_hocky');
    }
}
