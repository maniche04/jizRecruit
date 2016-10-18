<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    public function Interview()
    {
    	return $this->hasMany('App\Interview','id','candidateId');
    }
}
