<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongMay extends Model
{
    protected $table = "phongmay";
    public $primaryKey = "id_phong";
    public $timestamps = false;
    public $incrementing = false;
    public function thoikhoabieu()
    {
        return $this->hasMany('App\ThoiKhoaBieu', 'id_phong', 'id_phong');
    }
}
