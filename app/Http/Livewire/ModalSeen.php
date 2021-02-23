<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class ModalSeen extends Component
{
    public $events = [];

    public function render()
    {
        if (session('events.events_seen')) {
            $this->events = Event::where('active', true)->whereIn('id', session('events.events_seen'))->get();
        }

        return view('livewire.modal-seen');
    }
}
