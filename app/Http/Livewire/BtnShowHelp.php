<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BtnShowHelp extends Component
{
    public $helpId = null;

    public function modalHelp()
    {

    }

    public function mount($helpId)
    {
        $this->helpId = $helpId;
    }

    public function render()
    {
        return view('livewire.btn-show-help');
    }
}
