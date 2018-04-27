<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Software extends Model
{

    protected $fillable = [
		'name'
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
