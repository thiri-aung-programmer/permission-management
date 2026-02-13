<?php

namespace App\Livewire\FlowerPots;


use App\Models\FlowerPot;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Size;
use App\Models\Material;
use App\Models\Color;


class PotList extends Component
{
    public function render()
    {
        return view('livewire.flower-pots.pot-list',
        [
            'pots'=>FlowerPot::all(),
            'colors'=>Color::all(),
            'sizes'=> Size::all(),
            'materials'=>Material::all(),
        ]
        );
    }

     public function delete($id){
        FlowerPot::findOrFail($id)->delete();
          \session()->flash('message', 'Pot Deleted Successfully');

    }
    public function edit($id){
        $this->dispatch('isEdit',$id);
    }
}
