<?php

namespace App\Livewire\FlowerPots;

use App\Models\Color;
use App\Models\FlowerPot;
use App\Models\Material;
use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;

class PotCreate extends Component
{
    use WithFileUploads;
    public $pots, $potId, $name, $code, $images, $size_id, $color_id, $material_id, $price, $stock;

    protected function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'images' => 'required|image|max:2048',
            'size_id' => 'required',
            'color_id' => 'required',
            'material_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ];
    }

    public function store()
    {
        $this->validate();
        $filepath = $this->images->store('photos', 'public'); #ဒီကနေ filepath ထုတ်ပေးပါမယ် return string
        FlowerPot::create([
            'name' => $this->name,
            'code' => $this->code,
            'images' => $filepath, # orignial အစား server မှာ save ထားတဲ့ file path ကို မှတ်လိုက်မယ်
            'size_id' => $this->size_id,
            'color_id' => $this->color_id,
            'material_id' => $this->material_id,
            'price' => $this->price,
            'stock' => $this->stock,
        ]);
        session()->flash('message', 'Pot Created Successfully');
        $this->reset();
    }


    public function render()
    {
        return view(
            'livewire.flower-pots.pot-create',
            [
                'colors' => Color::all(),
                'sizes' => Size::all(),
                'materials' => Material::all()
            ]
        );
    }
}
