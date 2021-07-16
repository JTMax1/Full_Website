<?php

namespace App\Http\Controllers\Auth;

use auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\If_;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);

    }
    public function index()
    {

        return view('auth.login');
    }

    public function store(Request $request)
    {

        dd($request->remember);
        //login validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);



         //Sign the user in
        if (!auth()-> attempt($request->only('email', 'password'))) {
            return back() -> with('status', 'Invalid login details');
        }

        return redirect() -> route('dashboard');


    }


}
