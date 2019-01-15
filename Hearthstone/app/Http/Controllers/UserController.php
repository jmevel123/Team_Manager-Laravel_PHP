<?php

namespace App\Http\Controllers;

use App\User;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');    
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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);

        $users = new User;

        $users->username = $request->username;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findorFail($id);
        return view('users.show')->with('users', $users);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $users = User::findOrFail($id);
        
        return view('users.edit',compact('users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            $this->validate($request, [
                'username' => 'required|max:255','unique:users',
                'email' => 'required|max:255','unique:players',
                'password' => 'required|max:255',

            ]);
    
            $users = User::findorFail($id);
    
            $users->username = $request->input('username');
            $users->email = $request->input('email');
            $users->password = $request->input('password');
            $users->save();

            return  redirect()->action('UserController@index');

        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTeams = User::findOrFail($id);
        $deleteTeams->delete();

        return  redirect()->action('UserController@index');

    }

    public function myProfile(){
        $user = \Auth::user();
        return view('users.myprofile',compact('user'));
    }

   
}
