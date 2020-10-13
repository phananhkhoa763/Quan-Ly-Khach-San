<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khachhang';

	protected $fillable = ['HoTen', 'NgaySinh','GioTinh', 'CMND', 'SDT', 'DiaChi', 'email'];

	public $timestamps = false;

	public function KhachHangVaThePhong()
    {
        return $this->hasMany('App\ThuePhong','KhachHang_id','id');
    }

	
}
