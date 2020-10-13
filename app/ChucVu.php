<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'chucvu';

	protected $fillable = ['Name'];

	public $timestamps = false;

	public function ChucVuVaNhaVien()
    {
        return $this->hasMany('App\NhanVien','ChucVu_id','id');
    }
}
