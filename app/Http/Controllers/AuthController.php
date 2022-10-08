<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {

    }
    public function Login_index(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function reset(){
        return view('auth.passwords.reset');
    }
    public function forgot_password(){
        return view('auth.passwords.forgot-password');
    }
    public function search($email){
        return response()->json(User::where('email',$email)->get());
    }
    public function validation($data)
    {
        return $data->validate([
            'id'=>['required','integer','exists:users'],
            'name' => ['required', 'string', 'max:255','regex:/^([A-Za-zéàë]{4,30} ?)+$/i'],
            'email' => ['required', 'string', 'email', 'max:255','regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i'],
        ]);
    }
    public function send(Request $req){
        $data=$this->validation($req);
        Mail::to($req->email)->send(new ResetMail($req));
        return response()->json('send');
    }
    public function leaderboard($id=''){
        if($id=='')
            return response()->json(DB::select("select users.image,users.name,users.country,certificates.time_passed from users,certificates where users.id=certificates.user_id and certificates.time_passed<>'' order by certificates.time_passed limit 10"));
        else
            return response()->json(DB::select("select users.image,users.name,users.country,sessions.session_time_passed from users,sessions where users.id=sessions.user_id and sessions.session_time_passed<>'' and sessions.level_id=? order by sessions.session_time_passed limit 10",[$id]));
    }
}
