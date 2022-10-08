<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\Certificate;
use App\Models\Session;
use Illuminate\Support\Facades\File;

class FacebookController extends Controller
{
    public function __construct()
    {

    }
    public function LoginUsingFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function CallbackFromFacebook(){
        try {
            $user=Socialite::driver('facebook')->user();
            $u=DB::select('select count(*) as count,id,facebook_id from users where email = ? group by facebook_id,id', [$user->getEmail()]);
            if($u==null||$u[0]->count==0){
                $path=public_path().'/Images/users/';
                $image=file_get_contents($user->getAvatar());
                $picture=time().'.'.'jpg';
                File::put($path .'/'.$picture, $image);
                $saveUser=User::create([
                    'facebook_id'=>$user->getId(),
                    'name'=>$user->getName(),
                    'email'=>$user->getEmail(),
                    'password'=>Hash::make($user->getName().'@'.$user->getId()),
                    'image'=>$picture,
                ]);
                Session::create(['user_id'=>$saveUser['id'],'level_id'=>1]);
                Certificate::create([
                    'user_id'=>$saveUser['id'],
                    'language_id'=>1,
                    'certificate_id'=>\Ramsey\Uuid\Uuid::uuid4()->toString(),
                ]);
                Mail::to($saveUser['email'])->send(new WelcomeMail($saveUser));
                Auth::loginUsingId($saveUser['id']);
            }else{
                if($u[0]->facebook_id==''||$u[0]->facebook_id==null)
                    User::where('email',$user->getEmail())->update(['facebook_id'=>$user->getId()]);
                Auth::loginUsingId($u[0]->id);
            }
            // Auth::login($user);
            return redirect()->route('Home');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect('/404');
        }
    }
}
