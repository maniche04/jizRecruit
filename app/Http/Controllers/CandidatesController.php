<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\candidate;
use Illuminate\Support\Facades\Input;

class CandidatesController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$candidates = candidate::orderBy('firstName','ASC')->get();
		return view('candidate.list',array('candidates'=>$candidates));
	}


	public function save() {
		$data = Input::all();

		$candidate = new candidate;
		$candidate->firstName = $data['firstName'];
		$candidate->position = $data['position'];
		$candidate->email = $data['email'];
		$candidate->save();
		$savedCandidate = $candidate->id;
		$query = "INSERT INTO answers (questionId, candidateId, answer, updated_at, created_at) SELECT id, " . $savedCandidate . " , '', NOW(), NOW() FROM questions";
		\DB::statement($query);
		echo $savedCandidate;
	}

}
