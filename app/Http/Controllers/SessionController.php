<?php

namespace App\Http\Controllers;

use App\Models\Line_Session;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function validation($data){
        return $data->validate([
            'user_id'=>['required','integer','exists:users,id'],
            'level_id'=>['required','integer','exists:levels,id'],
        ]);
    }
    function validation_up($data){
        return $data->validate([
            'id'=>['required','integer','exists:sessions,id'],
            'session_time_passed'=>['required','string'],
            'session_validate'=>['required','boolean'],
            'session_progress'=>['required','integer'],
        ]);
    }
    function store(Request $req){
        $data=$this->validation($req);
        $s=DB::select('select count(*) as count from sessions where user_id=? and level_id=?',[Auth::user()->id,$data['level_id']]);
        if($s[0]->count==0)
            return response()->json(Session::create(['user_id'=>Auth::user()->id,'level_id'=>$data['level_id']]));
        return redirect('/404');
    }
    function update(Request $req){
        $data=$this->validation_up($req);
        return response()->json(Session::where('id',$data['id'])->update([
            'session_time_passed'=>$data['session_time_passed'],
            'session_validate'=>$data['session_validate'],
            'session_progress'=>$data['session_progress']
        ]));
    }
    function update_session_progress(){

    }
    function update_session_time_passed(){

    }
    function start($session_id){
        $s=Session::find($session_id);
        if($s!=null&&$s->user_id==Auth::user()->id){
            $lines=[];
            // $l=DB::select('select count(*) as count from line__sessions where Rep=false and session_id=?',[$session_id]);
            // if($l[0]->count==0){
                Line_Session::where('session_id',$session_id)->delete();
                if($s->level_id==1){
                    $q=DB::select('select id from questions where level_id=? order by rand()',[1]);
                    $lines=[
                        0=>['question_id'=>$q[0]->id,'session_id'=>$session_id],
                        1=>['question_id'=>$q[1]->id,'session_id'=>$session_id],
                        2=>['question_id'=>$q[2]->id,'session_id'=>$session_id],
                        3=>['question_id'=>$q[3]->id,'session_id'=>$session_id],
                        4=>['question_id'=>$q[4]->id,'session_id'=>$session_id],
                        5=>['question_id'=>$q[5]->id,'session_id'=>$session_id],
                        6=>['question_id'=>$q[6]->id,'session_id'=>$session_id],
                        7=>['question_id'=>$q[7]->id,'session_id'=>$session_id],
                        8=>['question_id'=>$q[8]->id,'session_id'=>$session_id],
                        9=>['question_id'=>$q[9]->id,'session_id'=>$session_id],
                    ];
                }else if($s->level_id==2){
                    $q=DB::select('select id from questions where level_id=? and title="Conditionals" order by rand()',[2]);
                    $q_1=DB::select('select id from questions where level_id=? and title="Switch" order by rand()',[2]);
                    $q_2=DB::select('select id from questions where level_id=? and title="The while Loop" order by rand()',[2]);
                    $q_3=DB::select('select id from questions where level_id=? and title="The do while Loop" order by rand()',[2]);
                    $q_4=DB::select('select id from questions where level_id=? and title="The for Loop" order by rand()',[2]);
                    $q_5=DB::select('select id from questions where level_id=? and title="Statements" order by rand()',[2]);
                    $lines=[
                        0=>['question_id'=>$q[0]->id,'session_id'=>$session_id],
                        1=>['question_id'=>$q[1]->id,'session_id'=>$session_id],
                        2=>['question_id'=>$q_1[0]->id,'session_id'=>$session_id],
                        3=>['question_id'=>$q_1[1]->id,'session_id'=>$session_id],
                        4=>['question_id'=>$q_2[0]->id,'session_id'=>$session_id],
                        5=>['question_id'=>$q_2[1]->id,'session_id'=>$session_id],
                        6=>['question_id'=>$q_3[0]->id,'session_id'=>$session_id],
                        7=>['question_id'=>$q_3[1]->id,'session_id'=>$session_id],
                        8=>['question_id'=>$q_4[0]->id,'session_id'=>$session_id],
                        9=>['question_id'=>$q_5[0]->id,'session_id'=>$session_id],
                    ];
                }else{
                    $q_2=DB::select('select id from questions where level_id=? and title="Arrays" order by rand()',[3]);
                    $q_3=DB::select('select id from questions where level_id=? and title="Strings" order by rand()',[3]);
                    $q_4=DB::select('select id from questions where level_id=? and title="Pointers" order by rand()',[3]);
                    $lines=[
                        0=>['question_id'=>$q_2[0]->id,'session_id'=>$session_id],
                        1=>['question_id'=>$q_2[3]->id,'session_id'=>$session_id],
                        2=>['question_id'=>$q_2[2]->id,'session_id'=>$session_id],
                        3=>['question_id'=>$q_2[1]->id,'session_id'=>$session_id],
                        4=>['question_id'=>$q_3[2]->id,'session_id'=>$session_id],
                        5=>['question_id'=>$q_3[1]->id,'session_id'=>$session_id],
                        6=>['question_id'=>$q_3[0]->id,'session_id'=>$session_id],
                        7=>['question_id'=>$q_4[0]->id,'session_id'=>$session_id],
                        8=>['question_id'=>$q_4[2]->id,'session_id'=>$session_id],
                        9=>['question_id'=>$q_4[1]->id,'session_id'=>$session_id],
                    ];
                }
                foreach ($lines as $value) {
                    Line_Session::create($value);
                }
            // }
            return response()->json($s);
        }
        else
            return response()->json(false);
    }
}
