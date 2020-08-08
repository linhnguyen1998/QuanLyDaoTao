<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    protected $table = "hocphan";
    public $primaryKey = "id_hocphan";
    public $timestamps = false;
    public $incrementing = false;

    public function lop()
    {
        return $this->hasMany('App\Lop', 'id_hocphan', 'id_hocphan');
    }

}
