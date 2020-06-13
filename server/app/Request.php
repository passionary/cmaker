<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
		'type','message','author','email'
	];
	public function book()
	{
		return $this->hasOne('App\Book');
	}
	public function article()
	{
		return $this->hasOne('App\Article');
	}
	public function video()
	{
		return $this->hasOne('App\Video');
	}	
}
