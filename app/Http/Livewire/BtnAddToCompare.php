<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BtnAddToCompare extends Component
{
    public $added = false;
    public $event_id;

    protected $listeners = ['checkStateBtnAddToCompare' => 'checkStateBtnAddToCompare'];

    public function addRemoveCompare()
    {

        $sessionArray = session('events.events_compare');

        if ($this->added) {
            $this->added = false;

            // change session
            if ($sessionArray) {
                if (in_array($this->event_id, $sessionArray)) {
                    array_splice($sessionArray, array_search($this->event_id, $sessionArray), 1);
                    session(['events.events_compare' => $sessionArray]);
                }
            }

        } else {
            $this->added = true;

            if ($sessionArray) {
                if (!in_array($this->event_id, $sessionArray)) {
                    session()->push('events.events_compare', $this->event_id);
                }
            } else {
                session()->push('events.events_compare', $this->event_id);
            }
        }

        // Вызов события для перерисовки кнопки в меню
        $this->emit('showCompareBtn');

    }

    public function checkStateBtnAddToCompare($event_id)
    {
        $this->event_id = $event_id;
        $this->added = false;

        if (session('events.events_compare')) {
            if (in_array($this->event_id, session('events.events_compare'))) {
                $this->added = true;
            }
        }
    }

    public function mount($event_id)
    {
        $this->checkStateBtnAddToCompare($event_id);
    }

    public function render()
    {
        return view('livewire.btn-add-to-compare');
    }
}
