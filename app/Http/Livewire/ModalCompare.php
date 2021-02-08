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

    protected $listeners = ['modalCompare' => 'modalCompare'];

    public function modalCompare()
    {
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
        }
        // Трансформировать коллекцию для вывода в таблице
        // Что я не вижу особого смысла в данной трансформации...
//        $eventsArray = $this->events->toArray();
//        $eventsTransform = [];
//        foreach ($eventsArray as $event) {
//            foreach ($event as $key => $value) {
//                $eventsTransform[$key] = array_column($eventsArray, $key);
//            }
//        }
//        $this->events = $eventsTransform;
    }

    public function render()
    {
        return view('livewire.modal-compare');
    }
}
