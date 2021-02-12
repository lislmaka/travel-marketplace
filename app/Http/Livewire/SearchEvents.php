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
    public $eventsCountries;
    public $eventsCities;

    public function clearSearch()
    {
        $this->reset(['query', 'eventsCountries', 'eventsCities']);
    }

    public function goToCity($city_id)
    {
        session(['events.events_country' => 'all']);
        session(['events.events_category' => 'all']);
        session(['events.events_city' => $city_id]);

        return redirect()->route('events.index');
    }

    public function goToCountry($country_id)
    {
        session(['events.events_city' => 'all']);
        session(['events.events_category' => 'all']);
        session(['events.events_country' => $country_id]);

        return redirect()->route('events.index');
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

    public function render()
    {
        if ($this->query) {

            $this->eventsCountries = $this->countEventsByCounties($this->query);
            $this->eventsCities = $this->countEventsByCities($this->query);
        }

        return view('livewire.search-events');
    }
}
