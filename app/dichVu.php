<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichVu extends Model
{
    protected $table = 'dichvus';

	protected $fillable = ['name', 'Gia'];

	public $timestamps = false;
}
