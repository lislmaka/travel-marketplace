<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventOption;
use App\Models\PivotEventOption;
use Livewire\Component;

class ModalCompare extends Component
{
    public $events = [];
    public $pivotEventsOptions = [];
    public $eventsOptions = [];
    public $noEvents = false;

    protected $listeners = ['modalCompare' => 'modalCompare'];

    public function deleteEventFromCompare($id)
    {
        $sessionArray = session('events.events_compare');
        if (in_array($id, $sessionArray)) {
            array_splice($sessionArray, array_search($id, $sessionArray), 1);
            session(['events.events_compare' => $sessionArray]);
        }
        // Вызов события для перерисовки кнопки в меню
        $this->emit('showCompareBtn');
        $this->emit('checkStateBtnAddToCompare', $id);

        $this->modalCompare();
    }

    public function modalCompare()
    {
        $this->noEvents = false;
        if (session('events.events_compare')) {

            $this->events = Event::where('active', true)->whereIn('id',
                session('events.events_compare'))->limit(5)->get();
            $this->eventsOptions = EventOption::where('active', true)->get();

            //
            foreach ($this->events as $event) {
                foreach ($event->options as $option) {
                    if (!in_array($option->option_id, $this->pivotEventsOptions)) {
                        $this->pivotEventsOptions[$option->option_id] = [
                            'option_name' => $option->option->name,
                            'option_description' => $option->option->description,
                            'option_id' => $option->option_id
                        ];
                    }
                }
            }
        } else {
            $this->events = [];
            $this->noEvents = true;
        }
    }

    public function render()
    {
        return view('livewire.modal-compare');
    }
}
