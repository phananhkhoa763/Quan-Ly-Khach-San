<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien';

	protected $fillable = ['HoTen', 'NgaySinh','GioTinh', 'CMND', 'SDT', 'DiaChi', 'ChucVu_id'];

	public $timestamps = false;

	public function NhanVienVaThuePhong()
    {
		return $this->hasMany('App\ThuePhong','NhanVien_id','id');
	}

	public function NhanVienVaChucVu()
    {
        return $this->hasMany('App\ChucVu','ChucVu_id','id');
    }
}
