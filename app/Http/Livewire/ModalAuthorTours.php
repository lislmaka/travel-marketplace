<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\User;
use Livewire\Component;

class ModalAuthorTours extends Component
{
    public $events = [];
    public $authorId;
    public $authorName = '';

    public function mount($authorId)
    {
        $this->authorId = $authorId;
    }

    public function render()
    {
        $this->events = Event::where('active', true)
            ->where('user_id', $this->authorId)
            ->get();

        $this->authorName = User::find($this->authorId)->name;

        return view('livewire.modal-author-tours');
    }
}
