<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\PivotEventCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EventsBlock extends Component
{
    public $events;
    public $eventsCount = 100000;
    public $topNames;
    public $selectedItem;

    public $blockType;

    //public $active = '';

    public function selectTopEventsName($id)
    {
        $this->selectedItem = $id;
    }

    public function mount($blockType)
    {
        $this->blockType = $blockType;
    }

    private function getPopularCountries()
    {
        $this->topNames = Event::where('active', true)
            ->select(DB::raw('count(id) as count, country_id'))
            ->groupBy('country_id')
            ->orderBy('count', 'desc')
            ->limit(3)
            ->get();

        $this->eventsCount = Event::where('active', true)->count();

        if (!$this->selectedItem) {
            $this->selectedItem = $this->topNames->first()->country_id;
        }

        $this->events = Event::where('active', true)
            ->where('country_id', $this->selectedItem)
            ->limit(4)->get();
    }
    private function getPopularCities()
    {
        $this->topNames = Event::where('active', true)
            ->select(DB::raw('count(id) as count, city_id'))
            ->groupBy('city_id')
            ->orderBy('count', 'desc')
            ->limit(3)
            ->get();

        $this->eventsCount = Event::where('active', true)->count();

        if (!$this->selectedItem) {
            $this->selectedItem = $this->topNames->first()->city_id;
        }

        $this->events = Event::where('active', true)
            ->where('city_id', $this->selectedItem)
            ->limit(4)
            ->get();
    }

    private function getPopularCategories()
    {
        $this->topNames = PivotEventCategory::select(DB::raw('count(event_id) as count, category_id'))
            ->join('events', 'events.id', '=', 'pivot_event_categories.event_id')
            ->join('event_categories', 'event_categories.id', '=', 'pivot_event_categories.category_id')
            ->where('events.active', true)
            ->groupBy('category_id')
            ->orderBy('count', 'desc')
            ->limit(4)
            ->get();

        $this->eventsCount = Event::where('active', true)->count();

        if (!$this->selectedItem) {
            $this->selectedItem = $this->topNames->first()->category_id;
        }

        $event_ids = PivotEventCategory::select('event_id')
            ->where('category_id', $this->selectedItem)->get();

        $this->events = Event::where('active', true)
            ->whereIn('id', $event_ids)
            ->limit(4)
            ->get();
    }

    public function render()
    {
        if($this->blockType == 'popular_countries') {
            $this->getPopularCountries();
        } elseif ($this->blockType == 'popular_cities') {
            $this->getPopularCities();
        } elseif ($this->blockType == 'popular_categories') {
            $this->getPopularCategories();
        }

        return view('livewire.events-block');
    }
}
