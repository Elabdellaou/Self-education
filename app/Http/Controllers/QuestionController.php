<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function show($session_id){
        $questions=DB::select('select questions.id,questions.title,questions.question_text as text,questions.image,questions.type from questions,line__sessions where line__sessions.question_id=questions.id and line__sessions.session_id=?',[$session_id]);
        if($questions!=null)
            return response()->json($questions);
        return redirect('/404');
    }
}
