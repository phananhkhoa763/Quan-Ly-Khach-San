<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suDungDichVu extends Model
{
      protected $table = 'su_dung_dich_vus';

	protected $fillable = ['khachHang_id', 'thuePhong_id','dichVu_id', 'soLuong','thanhToan'];

	public $timestamps = false;
}
