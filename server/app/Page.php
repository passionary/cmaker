<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	
	protected $fillable = [
		'content','book_id','order_id'
	];	

    public function book()
    {
    	return $this->belongsTo('App\Book');
    }
}
