<?php

namespace App\Http\Controllers;
use App\Http\Requests\AdminUserAddRequest;
use App\Models\AdminUser;
use App\Models\Role;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    
    public function index(Request $request){
    // $students = Student::all();
    // $adminusers=AdminUser::with("role")->get();
    // dd($adminusers);
    $adminusers =AdminUser::with('role')
    ->when($request->search, function ($query) use ($request) {
        $search = '%' . $request->search . '%';

        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', $search)
              ->orWhereHas('role', function ($r) use ($search) {
                  $r->where('name', 'like', $search);
              });
        });
    })->paginate(5);
    // dd($adminusers);
    return view("admin-users.index",compact("adminusers"));
   }

    public function create(AdminUserAddRequest $request){

   AdminUser::create([
        'name' => $request['name'],
        'username'=>$request['username'],
        'role_id'=> $request['role_id'],
        'phone'=> $request['phone'],
        'email' => $request['email'],
        'address'=> $request['address'],
        'pswd' => bcrypt($request['pswd']),
        'is_active'=> $request['is_active'],
        'gender'=> $request['gender']
    ]);
    return redirect('admin-user');
}
public function add(){
    $roles = Role::all();
    return view('admin-users.add',compact('roles'));
}

public function edit($id)
{
    $adminuser=AdminUser::findOrFail($id);
    $roles = Role::all();
    return view('admin-users.edit',compact('adminuser','roles'));
}
public function update(Request $request, $id){
     $adminuser=AdminUser::findOrFail($id);
      $adminuser->name = $request->name;
       $adminuser->username=$request->username;
       $adminuser->email = $request->email;
       $adminuser->pswd = bcrypt($request->pswd);
       $adminuser->role_id = $request->role_id;
       $adminuser->phone= $request->phone;
        $adminuser->address= $request->address;
        $adminuser->is_active=$request->is_active;
        $adminuser->gender = $request->gender;    
       $adminuser->update();
    return redirect('admin-user');
}
public function destroy($id)
{
    $adminuser=AdminUser::findOrFail($id);
    $adminuser->delete();
    return redirect('admin-user');
}
}
