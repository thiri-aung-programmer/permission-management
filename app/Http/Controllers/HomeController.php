<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        if(Auth::check()){
            return  redirect(route("dashboard"))->with("loggedIn","You Have Already Logged In!");
        }

        return view("index");
    }
    public function dashboard(){
        return view("dashboard");
    }
}
