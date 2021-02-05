<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class ModalCompare extends Component
{
    public $events = [];

    protected $listeners = ['modalCompare' => 'modalCompare'];

    public function modalCompare()
    {
        if (session('events.events_compare')) {
            $this->events = Event::where('active', true)->whereIn('id', session('events.events_compare'))->get();
        }
    }

    public function render()
    {
        return view('livewire.modal-compare');
    }
}
