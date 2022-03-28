<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function getSignup(){
        $genders=Gender::all();
        $nationalities=Nationality::all();
        return view('auth.signup', compact('genders','nationalities'));
    }
    public function postSignup(Request $request){
        $this->validate($request, [
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'login'=>'required|unique:users',
            'lastname'=>'required',
            'firstname'=>'required',
            'tel'=>'required',
            'birthdate'=>'required|date',
            'iin'=>'required',
            'registration_address'=>'required',
            'residential_address'=>'required',
            'gender_id'=>'required|not_in:0',
            'nationality_id'=>'required|not_in:0'
        ]);
        $user=User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'login' => $request->login,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'patronymic' => $request->patronymic,
            'tel' => $request->tel,
            'birthdate' => $request->birthdate,
            'iin' => $request->iin,
            'registration_address' => $request->registration_address,
            'residential_address' => $request->residential_address,
            'gender_id' => $request->gender_id,
            'nationality_id' => $request->nationality_id
        ]);
        DB::insert('insert into users_roles (user_id, role_id) values (?, ?)', [$user->id, 2]);

        return redirect()->route('auth.signin')->with('info', 'Сіз сәтті тіркелдіңіз');
    }

    public function getSignin(){
        return view('auth.signin');
    }
    public function postSignin(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
            return redirect()->back()->with('info-danger', 'Сіз қате пайдаланушы атын немесе құпия сөзді енгіздіңіз');
        }
        return redirect()->route('home')->with('info', 'Сіз жүйеге кірдіңіз');
    }

    public function getSignout(){
        Auth::logout();
        return redirect()->route('home')->with('info', 'Сіз жүйеден шықтыңыз!');
    }
}
