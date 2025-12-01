<?php

namespace App\Http\Controllers;
use App\Http\Requests\AdminUserAddRequest;
use App\Models\AdminUser;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    
    public function index(Request $request){
    // $students = Student::all();
    $adminusers=AdminUser::with("role")->get();
    dd($adminusers);
    $adminusers =AdminUser::with(['role:id,name'])
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

   
    $adminuser=new AdminUser();
    $adminuser->name = $request->name;
    
    $adminuser->save();
    return redirect('adminuser');
}

public function edit($id)
{
    $adminuser=AdminUser::findOrFail($id);
    return view('admin-users.edit',compact('adminuser'));
}
public function update(Request $request, $id){
     $adminuser=AdminUser::findOrFail($id);
      $adminuser->name = $request->name;
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
