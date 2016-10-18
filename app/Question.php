<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function Interview()
    {
    	return $this->hasMany('App\Interview','id','questionId');
    }
}
