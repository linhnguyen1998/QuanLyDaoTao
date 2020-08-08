<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class GiangVien extends Model
{
//    use Notifiable;

    protected $table = "giangvien";
    protected $primaryKey = "id_giangvien";
    public $timestamps = false;
    public $incrementing = false;

//    protected $fillable = [
//        hoten', 'email', 'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    public function thoikhoabieu()
    {
        return $this->hasMany('App\ThoiKhoaBieu', 'id_giangvien', 'id_giangvien');
    }
}
