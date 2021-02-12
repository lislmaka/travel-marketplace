<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalHelp extends Component
{
    protected $listeners = ['showHelpModal' => 'showHelpModal'];

    public $message = '';

    public function mount()
    {
        $this->reset('message');
    }
    public function showHelpModal($helpId)
    {
        $this->message = $helpId;
    }

    public function render()
    {
        return view('livewire.modal-help');
    }
}
