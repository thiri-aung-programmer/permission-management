<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    // public function index(){
    //     return view("index");
    // }

    // public function __invoke(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);
       
    //     if (Auth::attempt($credentials, $request->remember)) {
    //         $request->session()->regenerate();
    //          $this->authorize('view',Auth::user());
    //         return redirect()->intended(route('admin-user.view'));
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email or password is incorrect.',
    //     ])->onlyInput('email');
    // }

    public function __invoke(Request $request)
{
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->remember)) {

        $request->session()->regenerate();

        try {
            //  login ပြီးပြီးချင်း authorize စစ်
            $this->authorize('view', Auth::user());

        } catch (AuthorizationException $e) {

            //  permission မရှိ → auto logout
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

           return back()->withErrors([
             'email' => 'Your email has not got authorized yet!',
             ])->onlyInput('email');
        }

        // ✅ authorize OK
        return redirect()->intended(route('admin-user.view'));
    }

    return back()->withErrors([
        'email' => 'Email or password is incorrect.',
    ])->onlyInput('email');
}
}
