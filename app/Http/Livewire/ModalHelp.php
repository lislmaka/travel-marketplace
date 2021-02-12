<?php

namespace App\Http\Livewire;

use App\Models\ServiceHelp;
use Livewire\Component;

class ModalHelp extends Component
{
    protected $listeners = ['showHelpModal' => 'showHelpModal'];

    public $message = '';
    public $title = '';

    public function showHelpModal($helpId)
    {
        $helpCollection = ServiceHelp::inRandomOrder()->first();
        $this->message = $helpCollection->help_ru;
        $this->title = $helpCollection->title;
    }

    public function render()
    {
        return view('livewire.modal-help');
    }
}
