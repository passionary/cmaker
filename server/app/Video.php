<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
		'name','path','author','tags','request_id'
	];	
}
