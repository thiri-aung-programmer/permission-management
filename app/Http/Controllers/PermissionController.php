<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionAddRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Feature;
use Exception;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewPermission', Auth::user());
        $permissions = Permission::with('feature')
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
        return view("permissions.index", compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('createPermission', Auth::user());
        $features = Feature::all();
        return view('permissions.add', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionAddRequest $request)
    {
        $this->authorize('createPermission', Auth::user());
        // အရင်ရေးထားတဲ့ code အစ
        //     Permission::create([
        //     'name' => $request['name'],
        //     'feature_id'=> $request['feature_id']
        //      ]);
        //    return  redirect()->route('permission.index');
        // အရင်ရေးထားတဲ့ code အဆုံး
        $data = $request->validated();
        try {
            DB::beginTransaction();
            Permission::create([
                'name' => $data['name'],
                'feature_id' => $data['feature_id']
            ]);
            DB::commit();
            return redirect()->route('permission.index');

        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Created Fail"');
        }
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
    public function edit(Permission $permission)
    {
        $this->authorize('updatePermission', Auth::user());
        // $permission = Permission::findOrFail($permission->id);
        $features = Feature::all();
        return view('permissions.edit', compact('permission', 'features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('updatePermission', Auth::user());
        // $permission = Permission::findOrFail($permission->id);
        try{
            DB::beginTransaction();
                $permission->name = $request->name;
                $permission->feature_id = $request->feature_id;
                $permission->update();
            DB::commit();
            return redirect()->route('permission.index');
        }catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Updated Fail"');
        }               
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $this->authorize('deletePermission', Auth::user());
        // $permission = Permission::findOrFail($permission->id);         
        try{
            DB::beginTransaction();
                 $permission->delete();
            DB::commit();
            return redirect()->route('permission.index');
        }catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Updated Fail"');
        }       
        
    }
}
