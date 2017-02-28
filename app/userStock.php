<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userStock extends Model
{
public function stocks()
{
	   return $this->belongsTo('User');
}
}
