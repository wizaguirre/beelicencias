<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licence extends Model
{
    use SoftDeletes;

    protected $fillable = [
		'started_date',
		'due_date',
        'status'
	];

 	protected $hidden = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

 	public function customer(){
 	    return $this->belongsTo('App\Customer');
    }

    public function terminal(){
        return $this->hasMany('App\Terminal');
    }

	public function software(){
		return $this->belongsTo('App\Software');
	}

}
