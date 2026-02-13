<?php

namespace App\Livewire\FlowerPots;


use App\Models\FlowerPot;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Size;
use App\Models\Material;
use App\Models\Color;


class PotCreate extends Component
{
    use WithFileUploads;
    public $pots, $potId, $name, $code, $images, $size_id, $color_id, $material_id, $price, $stock;
    // public $sizes,$colors,$materials;
      public $isEdit = false;

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
    public function render()
    {
        return view('livewire.flower-pots.pot-create',
        [
            'colors'=>Color::all(),
            'sizes'=> Size::all(),
            'materials'=>Material::all(),
        ]);
    }
}
