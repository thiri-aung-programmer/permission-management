<?php

namespace App\Livewire;

use App\Models\FlowerPot;
use Livewire\Component;

class FlowerPotCrud extends Component
{

    public $isEditing = false;
    protected $listeners = [
        'isEditing' => 'handleEdit'
    ];

    public function handleEdit($id)
    {
        $this->isEditing = true;
    }

    public function render()
    {
        $this->pots = FlowerPot::latest()->get();
        return view('livewire.flower-pot-crud');
    }

}
