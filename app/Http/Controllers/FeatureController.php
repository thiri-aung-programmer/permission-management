<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatueAddRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Feature;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class FeatureController extends Controller
{

    public function index(Request $request)
    {
        // $students = Student::all();
        $this->authorize('viewFeature', Auth::user());
        $features = Feature::when($request->search, function ($query) use ($request) {
            return $query->whereAny(
                ['name'],
                'like',
                '%' . $request->search . '%'
            );
        })->paginate(5);

        return view("features.index", compact("features"));
    }

    public function create(FeatueAddRequest $request)
    {
        $this->authorize('createFeature', Auth::user());
        // အရင်ရေးထားတဲ့ code အစ
        // $feature=new Feature();
        // $feature->name = $request->name;    
        // $feature->save();
        // return redirect('feature');
        // အရင်ရေးထားတဲ့ code အဆုံး
        $data = $request->validated();
        try {
            DB::beginTransaction();
            Feature::create([
                'name' => $data['name'],
            ]);
            DB::commit();
            return redirect('feature');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Created Fail"');
        }
    }

    public function edit(Feature $feature)
    {
        $this->authorize('updateFeature', Auth::user());
        $feature = Feature::findOrFail($feature->id);        
        return view('features.edit', compact('feature'));
    }
    public function update(Request $request, Feature $feature)
    {
        $this->authorize('updateFeature', Auth::user());
        $feature = Feature::findOrFail($feature->id);       
            try{
            DB::beginTransaction();
                $feature->name = $request->name;
                $feature->update();
            DB::commit();
            return redirect('feature');
            }catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Updated Fail"');
            }      
        
    }
    public function destroy(Feature $feature)
    {
        $this->authorize('deleteFeature', Auth::user());
        $feature = Feature::findOrFail($feature->id);        
        try{
            DB::beginTransaction();
                $feature->delete();
            DB::commit();
            return redirect('feature');
        }catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Updated Fail"');
        }      
    }
}
