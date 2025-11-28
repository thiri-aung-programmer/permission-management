<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     public function index(Request $request){
    // $students = Student::all();
    $roles = Role::when($request->search, function ($query) use ($request) {
    return $query->whereAny(
        ['name'],
        'like',
        '%' . $request->search . '%'
    );
    })->paginate(5);
    
    return view("roles.index",compact("roles"));
   }
}
