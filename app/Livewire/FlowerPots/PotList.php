<?php

namespace App\Livewire\FlowerPots;

use App\Models\FlowerPot;
use Livewire\Component;

class PotList extends Component
{
    public function render()
    {
        return view('livewire.flower-pots.pot-list', [
            'pots' => FlowerPot::all()
        ]);
    }

    public function delete($id)
    {
        FlowerPot::findOrFail($id)->delete();
        \session()->flash('message', 'Pot Deleted Successfully');

    }

    public function edit($id)
    {
        $this->dispatch('isEditing', $id);
    }
}
