<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $fillable = [
		'subject','name','content','tags','user_id','request_id'
	];
	public function request()
	{
		return $this->belongsTo('App\Request');
	}
}
