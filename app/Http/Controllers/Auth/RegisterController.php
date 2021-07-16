<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);

    }
    public function index()
    {
         return view('auth.register');
    }

    //the folowing functionns is to ensure user record is accepted and stored in the DB
    public function store(Request $request)
    {
        // to display user submited details
        //dd($request->email);

        //User validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);



        //store user record


        User::create ([
           'name' => $request -> name,
           'username'=> $request -> username,
           'email'=> $request -> email,
           'password'=> Hash::make($request -> password),
        ]);


        //Sign the user in
        auth()-> attempt($request->only('email', 'password'));

        //alternatively you can use
        /*
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password

        ])

        */

        return redirect() -> route('dashboard');




        // redirect to a specific page
    }
}
