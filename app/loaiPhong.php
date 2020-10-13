<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaiPhong extends Model
{
    protected $table = 'loaiphongs';
	protected $fillable = ['name', 'chitiet','gia'];
	public $timestamps = false;

	public function LoaiPhongVaPhong()
    {
        return $this->hasMany('App\phong','loaiphong_id','id');
    }
}
