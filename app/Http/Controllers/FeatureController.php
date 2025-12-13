<?php

namespace App\Http\Controllers;
use App\Http\Requests\FeatueAddRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Feature;

use Illuminate\Http\Request;

class FeatureController extends Controller
{
    
    public function index(Request $request){
    // $students = Student::all();
     $this->authorize('viewFeature', Auth::user());
    $features = Feature::when($request->search, function ($query) use ($request) {
    return $query->whereAny(
        ['name'],
        'like',
        '%' . $request->search . '%'
    );
    })->paginate(5);
    
    return view("features.index",compact("features"));
   }

    public function create(FeatueAddRequest $request){

    $this->authorize('createFeature', Auth::user());
    $feature=new Feature();
    $feature->name = $request->name;
    
    $feature->save();
    return redirect('feature');
}

public function edit($id)
{

    $feature=Feature::findOrFail($id);
    $this->authorize('updateFeature', Auth::user());
    return view('features.edit',compact('feature'));
}
public function update(Request $request, $id){
     $feature=Feature::findOrFail($id);
      $this->authorize('updateFeature', Auth::user());
      $feature->name = $request->name;
       $feature->update();
    return redirect('feature');
}
public function destroy($id)
{
    $feature=Feature::findOrFail($id);
      $this->authorize('deleteFeature', Auth::user());
    $feature->delete();
    return redirect('feature');
}
}
