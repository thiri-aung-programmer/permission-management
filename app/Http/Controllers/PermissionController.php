<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionAddRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Feature;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $this->authorize('viewPermission', Auth::user());
         $permissions =Permission::with('feature')
    ->when($request->search, function ($query) use ($request) {
        $search = '%' . $request->search . '%';

        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', $search)
              ->orWhereHas('feature', function ($r) use ($search) {
                  $r->where('name', 'like', $search);
              });
        });
    })->paginate(5);
    // dd($adminusers);
    return view("permissions.index",compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('createPremission', Auth::user());
        $features = Feature::all();
        return view('permissions.add',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionAddRequest $request)
    {
          $this->authorize('createPremission', Auth::user());
        Permission::create([
        'name' => $request['name'],
        'feature_id'=> $request['feature_id']
         ]);
       return  redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission=Permission::findOrFail($id);
        $features = Feature::all();
        return view('permissions.edit',compact('permission','features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission=Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->feature_id= $request->feature_id;
        $permission->update();
        return  redirect()->route('permission.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission=Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permission.index');
    }
}
