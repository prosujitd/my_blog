<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $categories = [];
    public $deleteId;

    public function mount($deleteId){
        $this->deleteId = $deleteId;
    }


    public function hydrate($deleteId){
        $this->deleteId = $deleteId;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
