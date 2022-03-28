<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders=Gender::all();
        $nationalities=Nationality::all();
        $roles=Role::all();
        return view('admin.user.create', compact('genders', 'nationalities', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        DB::insert('insert into users_roles (user_id, role_id) values (?, ?)', [$user->id, $request->input('role_id')]);

        return redirect()->route('users.index')->with('info', 'Пайдаланушы сәтті қосылды!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $genders=Gender::all();
        $nationalities=Nationality::all();
        $roles=Role::all();
        return view('admin.user.edit', compact('user', 'genders', 'nationalities', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'login'=>'required',
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
        $user->update($request->all());
        DB::update('update users_roles set role_id=? where user_id=?', [$request->input('role_id'),$user->id]);
        return redirect()->route('users.index')->with('info', 'Сәтті өңделді!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        DB::delete('delete from users_roles where user_id=?', [$user->id]);
        return redirect()->route('users.index')->with('info', 'Сәтті жойылды!!!');
    }
}
