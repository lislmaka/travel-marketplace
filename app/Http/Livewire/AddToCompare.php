<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToCompare extends Component
{
    public $added = false;

    public function addRemoveCompare()
    {
        if($this->added) {
            $this->added = false;
            // change session
        } else {
            $this->added = true;
            // change session
        }
    }

    public function render()
    {
        return view('livewire.add-to-compare');
    }
}
