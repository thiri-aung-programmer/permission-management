<?php

namespace App\Livewire;

use App\Models\FlowerPot;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Size;
use App\Models\Material;
use App\Models\Color;

class FlowerPotCrud extends Component
{
    use WithFileUploads;
    public $pots, $potId, $name, $code, $images, $size_id, $color_id, $material_id, $price, $stock;
    public $sizes,$colors,$materials;
    public $isEdit = false;

    public function render()
    {
        $this->pots = FlowerPot::latest()->get();
        $this->sizes=Size::latest()->get();
        $this->colors=Color::latest()->get();
        $this->materials=Material::latest()->get();
        return view('livewire.flower-pot-crud');
    }
    public function rules(){
         if ($this->images && !is_string($this->images)) {
         $rules['images'] = 'image|max:2048';
         }
         else{
             $rules['images'] = 'nullable';
         }
        $rules = [
            'name' => 'required',
            'code' => 'required',           
            'size_id' => 'required',
            'color_id' => 'required',
            // 'images'=>'nullable',
            'material_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ];
      
        return $rules;
    }
    public function store()
    {
        //  dd($this->images);
        $this->validate();    
          $imagePath = $this->images->store('photos', 'public');
        FlowerPot::create([
            'name' => $this->name,
            'code' => $this->code,
            // 'images'=> $this->images->getClientOriginalName(),
            'images'=> $imagePath, //server မှာ save ထားတဲ့ path ထည့်လိုက်တယ်။ 
            'size_id' => $this->size_id,
            'color_id' => $this->color_id,
            'material_id' => $this->material_id,
            'price' => $this->price,
            'stock' =>   $this->stock,
        ]);
        \session()->flash('message', 'Pot Created Successfully');
        $this->resetInput();
    }
    public function resetInput(){
        $this->name="";
        $this->code= "";
        $this->images=null;
        $this->size_id= "";
        $this->color_id= "";
        $this->material_id= "";
        $this->price= "";
        $this->stock= "";
        $this->isEdit=false;
        $this->potId="";
    }
    public function edit($id){
        $pot=FlowerPot::findOrFail($id);
         $this->name=$pot->name;
        $this->code= $pot->code;
        $this->images=$pot->images;
        $this->size_id= $pot->size_id;
        $this->color_id= $pot->color_id;
        $this->material_id= $pot->material_id;
        $this->price=$pot->price;
        $this->stock= $pot->stock;
        $this->isEdit=true;
        $this->potId=$pot->id;
    }
    public function update(){
         $this->validate(); 
        if($this->potId){
            $pot=FlowerPot::findOrFail($this->potId);
            $prepareFlowerpotData=[
            'name' => $this->name,
            'code' => $this->code,
            // 'images'=> $this->images->getClientOriginalName(),
            'size_id' => $this->size_id,
            'color_id' => $this->color_id,
            'material_id' => $this->material_id,
            'price' => $this->price,
            'stock' =>   $this->stock,
            ];
            if($this->images && !is_string($this->images))
            {
                // ၂။ ပုံဟောင်း ရှိမရှိ စစ်မယ်၊ ရှိရင် Storage ထဲက ဖျက်မယ်
                if ($pot->images) {
                Storage::disk('public')->delete($pot->images);
            }
                $imagePath = $this->images->store('photos', 'public');
                $prepareFlowerpotData['images'] =$imagePath;
            }
            $pot->update( $prepareFlowerpotData );
            \session()->flash('message', 'Pot Updated Successfully');
            $this->resetInput();
        }

    }
    public function delete($id){
        FlowerPot::findOrFail($id)->delete();
          \session()->flash('message', 'Pot Deleted Successfully');

    }
}
