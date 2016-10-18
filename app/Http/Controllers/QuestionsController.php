<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use Illuminate\Support\Facades\Input;

class QuestionsController extends Controller
{
     /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function all() {
		$questions = Question::orderBy('num','ASC')->get();
		return view('questions.list',array('questions'=>$questions));
	}

	public function index() {
		return view('questions.index');
	}

	public function save() {
		$data = Input::all();

		$question = new Question;
		$question->num = $data['questionnum'];
		$question->question = $data['questiontext'];
		$question->save();
	}

	public function delete($questionid) {
		if (Question::where('id','=',$questionid)->delete()) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
