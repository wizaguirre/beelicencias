<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Terminal extends Model
{
    use SoftDeletes;

    protected $fillable = [
		'name',
		'serial',
		'lastAccess',
		'active'

	];

 	protected $hidden = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

    public function licence(){
        return $this->belongsTo('App\Licence');
    }
}
