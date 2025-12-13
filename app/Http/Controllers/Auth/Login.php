<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    // public function index(){
    //     return view("index");
    // }

    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //  $credentials['password'] = bcrypt($credentials['password']);
        //  dd($credentials);
        //  $2y$12$jxSDFON4vtHs3lowLHtFl.zne/XciXKqIKDjob.Z34T2UW7wxIXta

        //  dd(bcrypt($credentials['password']));
       
        // dd(Auth::attempt($credentials, $request->remember));
        // Check login
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
             $this->authorize('view',Auth::user());
            return redirect()->intended(route('admin-user.view'));
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ])->onlyInput('email');
    }
}
