<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactionHistory extends Model
{
    //Hopefully* change primary key to the created_at field
    protected $primaryKey = 'created_at';
    //disable any sort of auto incrementing 
    public $incrementing = false;
}
