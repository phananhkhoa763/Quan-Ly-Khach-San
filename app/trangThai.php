<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trangThai extends Model
{
    protected $table = 'trangthais';

	protected $fillable = ['name'];

	public $timestamps = false;

	public function TrangThaiVaPhong()
    {
        return $this->hasMany('App\phong','trangthai_id','id');
    }
}
