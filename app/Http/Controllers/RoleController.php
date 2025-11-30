<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleAddRequest;

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
    
    public function create(RoleAddRequest $request){

   
    $role=new Role();
    $role->name = $request->name;
    
    $role->save();
    return redirect('role');
}

public function edit($id)
{
    $role=Role::findOrFail($id);
    return view('roles.edit',compact('role'));
}
public function update(Request $request, $id){
     $role=Role::findOrFail($id);
      $role->name = $request->name;
       $role->update();
    return redirect('role');
}
public function destroy($id)
{
    $role=Role::findOrFail($id);
    $role->delete();
    return redirect('role');
}
}
