<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuePhong extends Model
{
     protected $table = 'thuephong';

	protected $fillable = ['Phong_id', 'KhachHang_id','NgayDen', 'NgayDi', 'ThanhToan', 'NhanVien_id', 'NgayTT'];

	public $timestamps = false;

	public function ThuePhongVaNhanVien()
    {
		return $this->belongsTo('App\NhanVien','NhanVien_id','id');
	}

	public function ThuePhongVaKhachHang()
    {
		return $this->belongsTo('App\KhachHang','KhachHang_id','id');
	}

	public function ThuePhongVaPhong()
    {
        return $this->hasMany('App\phong','Phong_id','id');
    }
}
