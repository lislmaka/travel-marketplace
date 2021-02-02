<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventCity;
use App\Models\EventCountry;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchEvents extends Component
{
    public $query = null;
    public $events_countries;
    public $events_cities;
    public $countOfAllEvents = 0;
    public $showAll = null;

    public function mount()
    {
        $this->clearSearch();
    }

    public function clearSearch()
    {
        $this->query = null;
        $this->showAll = null;
        $this->events_countries = [];
        $this->events_cities = [];
    }

    public function searchAll()
    {
        $this->showAll = 'all';
    }

    private function countEventsByCounties($country = null)
    {
        $events = Event::where('events.active', true)
            ->select(DB::raw('count(events.id) as count, events.country_id'))
            ->join('event_countries', 'event_countries.id', '=', 'events.country_id')
            ->groupBy('country_id')
            ->orderByRaw('event_countries.name asc');
        if ($country) {
            $country = '%'.$country.'%';
            $events->where('event_countries.name', 'like', $country);
        }
        return $events->get();
    }

    private function countEventsByCities($city = null)
    {
        $events = Event::where('events.active', true)
            ->select(DB::raw('count(events.id) as count, city_id, events.country_id'))
            ->join('event_cities', 'event_cities.id', '=', 'events.city_id')
            ->groupBy('city_id')
            ->groupBy('country_id')
            ->orderByRaw('event_cities.name asc');
        if ($city) {
            $city = '%'.$city.'%';
            $events->where('event_cities.name', 'like', $city);
        }
        return $events->get();
    }

    private function countOfAllEvents()
    {
        $events = Event::where('events.active', true);
        return $events->count();
    }

    public function render()
    {
        $this->countOfAllEvents = $this->countOfAllEvents();

        if ($this->query) {
            $this->showAll = null;

            $this->events_countries = $this->countEventsByCounties($this->query);
            $this->events_cities = $this->countEventsByCities($this->query);
        }

        if ($this->showAll) {
            $this->events_countries = $this->countEventsByCounties();
            $this->events_cities = $this->countEventsByCities();
        }
        return view('livewire.search-events');
    }
}
