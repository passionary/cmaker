<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [
		'genre','name','size','count_of_pages','tags','user_id','request_id'
	];
  public function pages()
  {
  	return $this->hasMany('App\Page');
  }
  public function request()
	{
		return $this->belongsTo('App\Request');
	}
}
