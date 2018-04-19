<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	//table name declaration
	protected $table = 'cats';
	protected $fillable = [
			'name',
			'date_of_birth',
			'breed_id',
	];
	/**
     * Get the phone record associated with the user.
     */
    public function breed(){
        return $this->belongsTo('App\Breed');
    }
	
}
