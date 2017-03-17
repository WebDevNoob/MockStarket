<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userStock extends Model
{

public $timestamps = false;

public function stocks()
{

	   return $this->belongsTo('User');
}
}
