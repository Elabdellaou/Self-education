<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
    }
    public function validation($data){
        return $data->validate([
            'id'=>['integer','exists:users'],
            'password'=>['required', 'string', 'min:8', 'confirmed','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i'],
        ]);
    }
    public function validation_1($data){
        return $data->validate([
            'id'=>['integer','exists:users'],
            'name' => ['required', 'string', 'max:255'],
            'country'=>['string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255','regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i'],
            'password' => ['required', 'string', 'min:8','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i'],
        ]);
    }
    public function validation_2($data){
        return $data->validate([
            'id'=>['integer','exists:users'],
            'name' => ['required', 'string', 'max:255'],
            'country'=>['string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255','regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i'],
        ]);
    }
    public function validation_image($data){
        return $data->validate([
            'image' => ['required', 'image', 'max:2048','mimes:jpeg,png,jpg'],
        ]);
    }
    public function password_update(request $req){
        $data=$this->validation($req);
        User::where('id',$data['id'])->update(['password' => Hash::make($data['password'])]);
        return redirect()->route('Login');
    }
    public function update(request $req){
        $data=$this->validation_1($req);
        $data['password'] = Hash::make($data['password']);
            return User::where('id',$data['id'])->update([
                'name'=>$data['name'],
                'country'=>$data['country'],
                'email'=>$data['email'],
                'password' => $data['password']
            ]);
    }
    public function update_1(request $req){
        $data=$this->validation_2($req);
            return User::where('id',$data['id'])->update([
                'name'=>$data['name'],
                'country'=>$data['country'],
                'email'=>$data['email']
            ]);
    }
    public function update_image(request $req,$id){
        $data=$this->validation_image($req);
        $image = $req->file('image');
        $filename = $image->getClientOriginalName();
        if($filename!='default.png'&&$filename!='nav-user.png')
            $picture=time().'.'.$image->getClientOriginalExtension();
        else
            $picture=$filename;
        $u=DB::select('select count(*) as count from users where id=?',[$id]);
        $path=public_path().'/Images/users/';
        if($u[0]->count>0){
            if($filename!='default.png'&&$filename!='nav-user.png'){
                $image->move($path, $picture);
                $old_picture=DB::select('select image from users where id=? limit 1',[$id]);
                if($old_picture[0]->image!='default.png'&&$old_picture[0]->image!='nav-user.png')
                    unlink($path.''.$old_picture[0]->image);
            }
            User::where('id',$id)->update([
                'image'=>$picture
            ]);
        }
        return redirect()->route('Settings');
    }
}
