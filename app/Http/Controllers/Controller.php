<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function contact(){
        return view('contact');
    }
    public function index(){
        $certificate=DB::select('select id,certificate_id,language_progress from certificates where user_id = ?', [Auth::user()->id]);
        $certificate=['id'=>$certificate[0]->id,'certificate_id'=>$certificate[0]->certificate_id,'language_progress'=>$certificate[0]->language_progress];
        $sessions=DB::select('select id,session_progress,session_validate from sessions where user_id=? ',[Auth::user()->id]);
        $session_1=['id'=>$sessions[0]->id,'session_progress'=>$sessions[0]->session_progress,'session_validate'=>$sessions[0]->session_validate];
        if($session_1['session_validate']==true){
            $session_2=['id'=>$sessions[1]->id,'session_progress'=>$sessions[1]->session_progress,'session_validate'=>$sessions[1]->session_validate];
            if($session_2['session_validate']==true){
                $session_3=['id'=>$sessions[2]->id,'session_progress'=>$sessions[2]->session_progress,'session_validate'=>$sessions[2]->session_validate];
                return view('home',compact('session_1','session_2','session_3','certificate'));
            }
            else
                return view('home',compact('session_1','session_2','certificate'));
        }
        else
            return view('home',compact('session_1','certificate'));
    }
    public function leaderboard(){
        $users=DB::select("select users.image,users.name,users.country,certificates.time_passed from users,certificates where users.id=certificates.user_id and time_passed<>'' order by time_passed limit 10");
        return view('leaderboard',compact('users'));
    }
    public function settings(){
        return view('settings');
    }
    public function test(){
        return view('test');
    }
    public function getCountry($country){
        return DB::select("select country from countries where country like '%".$country."%'");
    }
    public function validation_contact($data){
        return $data->validate([
            'name'=>['required', 'string', 'max:255','regex:/^([A-Za-zéàë]{4,30} ?)+$/i'],
            'email'=>['required', 'string', 'email', 'max:255','regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i'],
            'message'=>['required','string','max:255','min:5']
        ]);
    }
    public function contact_me(Request $req){
        $data=$this->validation_contact($req);
        Mail::to('ibraelabde@gmail.com')->send(new ContactMail($data));
        return response()->json(true);
    }
}
