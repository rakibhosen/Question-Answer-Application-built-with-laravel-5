<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;

class FavoritesController extends Controller

{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Question $question){
        $question->favorites()->attach(Auth()->id());
        return back(); 
    }

    public function destroy(Question $question){
        $question->favorites()->detach(Auth()->id());
        return back();
    }
}
