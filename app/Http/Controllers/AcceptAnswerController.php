<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer){
        if(\Gate::denies('accept',$answer)){
            abort(403,"access denied");
        };
        $answer->question->acceptBestAnswer($answer);
        return back();
    }
}
