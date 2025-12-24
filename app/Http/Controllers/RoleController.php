<?php

namespace App\Http\Controllers;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\RoleAddRequest;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
     public function index(Request $request){
         $this->authorize('viewRole', Auth::user());
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
    $this->authorize('createRole', Auth::user());
     // အရင်ရေးထားတဲ့ code အစ
    // $role=new Role();
    // $role->name = $request->name;
    
    // $role->save();
    // return redirect('role');
    // အရင်ရေးထားတဲ့ code အဆုံး
    $data=$request->validated();
      try{
        DB::beginTransaction();
        Role::create([
            'name'=>$data['name'],
        ]);
        DB::commit();
        return redirect('role');

      }catch(Exception $e){
         DB::rollBack();
        return back()->with('error','Created Fail"');
      }
}

public function edit(Role $role)
{
    $this->authorize('updateRole', Auth::user());
    // $role=Role::findOrFail($role->id);     
    return view('roles.edit',compact('role'));
}
public function update(Request $request, Role $role){
     $this->authorize('updateRole', Auth::user());
    //  $role=Role::findOrFail($role->id);
     try{
            DB::beginTransaction();
             $role->name = $request->name;
             $role->update();
            DB::commit();
            return redirect('role');

        }catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Updated Fail"');
        }
    
    
}
public function destroy(Role $role)
{
    $this->authorize('deleteRole', Auth::user());    
    // $role=Role::findOrFail($role->id);
    try{
            DB::beginTransaction();
            $role->delete();
            DB::commit();
            return redirect('role');

        }catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Updated Fail"');
        }   
    
}
public function showpermissions(Role $role){
    $this->authorize('viewPermission', Auth::user());
    // $role=Role::findOrFail($role->id);
    $permissions = Permission::all();
    $assigned = $role->permissions->pluck('id')->toArray();
    return view('roles.rolepermissions',compact('role','permissions','assigned'));
}
public function updatePermissions(Request $request, Role $role)
{
    $this->authorize('updatePermission', Auth::user());
    // $data = Role::findOrFail($role->id);   

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
    $this->authorize('viewPermission', Auth::user());
    $roles=Role::get();
    $permissionbyrole =PermissionRole::with(['role', 'permission.feature'])->get()->toArray();
    return view('roles.showPermissionsByRole',compact('roles','permissionbyrole'));
}
}
