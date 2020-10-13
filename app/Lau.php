<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lau extends Model
{
    protected $table = 'laus';
	protected $fillable = ['name'];
	public $timestamps = false;
	
	public function LauVaPhong()
    {
        return $this->hasMany('App\phong','lau_id','id');
    }
}
