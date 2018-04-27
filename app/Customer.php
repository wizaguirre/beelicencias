<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{

    protected $fillable = [
        'cedularuc',
		'name',
		'contact',
		'email',
		'phone'
	];

 	protected $hidden = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function licences(){
		return $this->hasMany('App\Licence');
	}


}
