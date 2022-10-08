<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Line_SessionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function show($session_id){
        $lines=DB::select('select id,question_id,Rep from line__sessions where session_id=?',[$session_id]);
        if($lines!=null)
            return response()->json($lines);
        return redirect('/404');
    }
}
