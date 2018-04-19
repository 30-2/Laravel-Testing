<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
	public $timestamps = false;
	protected $table = 'breeds';
	public function cats(){
		return $this->hasMany('Furbook\Cat');
	}
}
