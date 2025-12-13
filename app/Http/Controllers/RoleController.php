<?php

namespace App\Http\Controllers;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleAddRequest;

class RoleController extends Controller
{
     public function index(Request $request){
         $this->authorize('view', Auth::user());
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

    $this->authorize('add', Auth::user());
    $role=new Role();
    $role->name = $request->name;
    
    $role->save();
    return redirect('role');
}

public function edit($id)
{
    $role=Role::findOrFail($id);
     $this->authorize('update', Auth::user());
    return view('roles.edit',compact('role'));
}
public function update(Request $request, $id){
     $role=Role::findOrFail($id);
      $this->authorize('update', Auth::user());
      $role->name = $request->name;
       $role->update();
    return redirect('role');
}
public function destroy($id)
{
     $this->authorize('delete', Auth::user());
    $role=Role::findOrFail($id);
    $role->delete();
    return redirect('role');
}
public function showpermissions($id){
    $this->authorize('viewPermission', Auth::user());
    $role=Role::findOrFail($id);
    $permissions = Permission::all();
     $assigned = $role->permissions->pluck('id')->toArray();
    return view('roles.rolepermissions',compact('role','permissions','assigned'));
}
public function updatePermissions(Request $request, $roleId)
{
    $role = Role::findOrFail($roleId);
     $this->authorize('editPermission', Auth::user());

    // $newPermissions = $request->input('permissions', []);
    // $existing = $role->permissions->pluck('id')->toArray();

    // // filter out permissions that already exist (to prevent duplicates)
    // $toAdd = array_diff($newPermissions, $existing);

    // // attach only new ones
    // if (!empty($toAdd)) {
    //     $role->permissions()->attach($toAdd);
    // }
    $newPermissions = $request->input('permissions', []);

     // sync will attach new ones and detach removed ones automatically
      $role->permissions()->sync($newPermissions);
    
         return redirect('role');
}
public function viewPermissionRole(){
    $roles=Role::get();
    $permissionbyrole =PermissionRole::with(['role', 'permission.feature'])->get()->toArray();
    return view('roles.showPermissionsByRole',compact('roles','permissionbyrole'));
}
}
