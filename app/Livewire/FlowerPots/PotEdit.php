<?php

namespace App\Livewire\FlowerPots;

use App\Models\Color;
use App\Models\FlowerPot;
use App\Models\Material;
use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;

class PotEdit extends Component
{
    use WithFileUploads;
    public $id, $pots, $potId, $name, $code, $images, $size_id, $color_id, $material_id, $price, $stock;
    public $flower_pot;
    protected $listeners = [
        'isEditing' => 'handleEdit'
    ];
    protected function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'images' => 'nullable|image|max:2048',
            'size_id' => 'required',
            'color_id' => 'required',
            'material_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ];
    }

    public function handleEdit($id)
    {
        $this->id = $id;
        $this->flower_pot = FlowerPot::find($id);

        // Assign database values to the public properties bound via wire:model
        $this->name = $this->flower_pot->name;
        $this->code = $this->flower_pot->code;
        $this->price = $this->flower_pot->price;
        $this->stock = $this->flower_pot->stock;

        // Foreign Key IDs for your new selects
        $this->size_id = $this->flower_pot->size_id;
        $this->color_id = $this->flower_pot->color_id;
        $this->material_id = $this->flower_pot->material_id;
    }

    public function update()
    {
        $this->validate();
        $prepareFlowerpotData = [
            'name' => $this->name,
            'code' => $this->code,
            'size_id' => $this->size_id,
            'color_id' => $this->color_id,
            'material_id' => $this->material_id,
            'price' => $this->price,
            'stock' => $this->stock,
        ];

        if ($this->images) {

            $filepath = $this->images->store('photos', 'public'); #ဒီကနေ filepath ထုတ်ပေးပါမယ် return string
            $prepareFlowerpotData['images'] = $filepath;

        }

        $this->flower_pot->update($prepareFlowerpotData);
        session()->flash('message', 'Pot Created Successfully');
        $this->reset();
    }


    public function render()
    {
        return view(
            'livewire.flower-pots.pot-edit',
            [
                'colors' => Color::all(),
                'sizes' => Size::all(),
                'materials' => Material::all()
            ]
        );
    }
}