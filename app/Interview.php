<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model

{
	protected $table = 'answers';

    public function questions()
    {
    	return $this->belongsTo('App\Question','questionId','id');
    }

    public function candidates()
    {
    	return $this->belongsTo('App\candidate','candidateId','id');
    }
}
