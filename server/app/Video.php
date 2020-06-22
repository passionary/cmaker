<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
		'name','path','tags','user_id','request_id'
	];
	public function request()
	{
		return $this->belongsTo('App\Request');
	}
}
