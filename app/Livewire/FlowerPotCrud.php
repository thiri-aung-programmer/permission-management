<?php

namespace App\Livewire;

use App\Models\FlowerPot;
use Livewire\Component;

use Livewire\WithFileUploads;

class FlowerPotCrud extends Component
{
    use WithFileUploads;
    public $pots, $potId, $name, $code, $images, $size, $color, $material, $price, $stock;
    public $isEdit = false;

    public function render()
    {
        $this->pots = FlowerPot::latest()->get();
        return view('livewire.flower-pot-crud');
    }
    public function store()
    {
        //  dd($this->images);
        $this->validate([
             'name' => 'required',
            'code' => 'required',
            'images' => 'required|image|max:2048',
            'size' => 'required',
            'color' => 'required',
            'material' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
         $imagePath = $this->images->store('flower-pots', 'public');
        FlowerPot::create([
            'name' => $this->name,
            'code' => $this->code,
            'images'=> $this->images->getClientOriginalName(),
            'size' => $this->size,
            'color' => $this->color,
            'material' => $this->material,
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
        $this->size= "";
        $this->color= "";
        $this->material= "";
        $this->price= "";
        $this->stock= "";
        $this->isEdit=false;
        $this->potId="";
    }

}
