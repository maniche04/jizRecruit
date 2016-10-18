<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Interview;
use App\candidate;
use Illuminate\Support\Facades\Input;

class InterviewController extends Controller
{
    public function index() {
    	return view('welcome');
    }

    public function start($candidateId) {
    	$answers = Interview::with('questions')->where('candidateId','=',$candidateId)->get();
    	return view('interview.process',array('answers'=>$answers));
    }

    public function save() {
    	$data = Input::all();

    	$answer = [];
    	$answer['answer'] = $data['answer'];
    	if (Interview::where('id','=',$data['answerId'])->update($answer)) {
    		echo 1;
    	} else {
    		echo 0;
    	}
    }

    public function check($candidateId) {
        $blanks = \DB::select("SELECT count(*) as count FROM answers WHERE candidateId = " . $candidateId . " AND LENGTH(answer) < 1");
        if ($blanks[0]->count > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function results($candidateId) {
        $answers = Interview::with('questions')->where('candidateId','=',$candidateId)->get();
        $candidate = candidate::where('id','=',$candidateId)->get();
        return view('interview.results',array('answers'=>$answers,'candidate'=>$candidate));
    }

}
