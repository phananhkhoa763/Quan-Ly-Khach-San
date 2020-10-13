<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phong_images extends Model
{
	protected $table = 'phongimages';
	
	protected $fillable = ['images', 'phong_id'];

	public $timestamps = false;

	public function PhongVaLau()
    {
		return $this->belongsTo('App\phong','phong_id','id');
	}
}
