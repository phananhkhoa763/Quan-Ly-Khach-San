<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class phong extends Model
{
    protected $table = 'phongs';

	protected $fillable = ['name', 'loaiphong_id','trangthai_id', 'lau_id'];

	public $timestamps = false;

	public function PhongVaLau()
    {
		return $this->belongsTo('App\Lau','lau_id','id');
	}

	public function PhongVaLoaiPhong()
    {
		return $this->belongsTo('App\loaiPhong','loaiphong_id','id');
	}

	public function PhongVaTrangThai()
    {
		return $this->belongsTo('App\trangThai','trangthai_id','id');
	}
	
	public function PhongVaImages()
    {
        return $this->hasMany('App\phong_images','phong_id','id');
    }
	static function deleteByPhongimages($phong_id)
	{
     DB::select('delete from phongimages where phong_id = ?', [$phong_id]);
	}
}
