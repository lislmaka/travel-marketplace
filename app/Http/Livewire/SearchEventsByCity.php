<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\PivotEventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchEventsByCity extends Component
{
    public $eventsCitiesCollection = [];
    public $eventsCitiesTotal = 0;
    public $eventsCitiesSelected = null;

    public $querySearch = null;

    private $eventsCountriesDefault = 'all';
    private $eventsCategoriesDefault = 'all';

    public function clearSearch()
    {
        $this->reset('querySearch');
    }
    private function getCountOfEventsByCities($request)
    {
        $eventsCitiesCollection = Event::where('events.active', true)
            ->select(DB::raw('count(events.id) as count, city_id, events.country_id'))
            ->join('event_cities', 'event_cities.id', '=', 'events.city_id')
            ->groupBy('city_id')
            ->groupBy('country_id')
            ->orderByRaw('event_cities.name asc');
        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->eventsCategoriesDefault) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $eventsCitiesCollection->whereIn('events.id', $event_ids);
        }
        /*
         * Если выбрана страна
         */
        if ($request->session()->get('events.events_country') != $this->eventsCountriesDefault) {
            $eventsCitiesCollection->where('events.country_id', $request->session()->get('events.events_country'));
        }
        /*
         * Если введен запрос $queryString
         */
        if ($this->querySearch) {
            $eventsCitiesCollection->where('event_cities.name', 'like', '%'.$this->querySearch.'%');
        }


        return $eventsCitiesCollection->get();
    }

    private function getEventsCitiesTotal($request)
    {
        $eventsCitiesTotal = Event::where('active', true);
        /*
         * Если выбрана страна
         */
        if ($request->session()->get('events.events_country') != $this->eventsCountriesDefault) {
            $eventsCitiesTotal->where('country_id', $request->session()->get('events.events_country'));
        }
        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->eventsCategoriesDefault) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $eventsCitiesTotal->whereIn('id', $event_ids);
        }
        return $eventsCitiesTotal->count();
    }

    public function render(Request $request)
    {
        $eventsCitiesCollection = $this->getCountOfEventsByCities($request);
        // Cities
        $this->eventsCitiesCollection = $eventsCitiesCollection;
        $this->eventsCitiesTotal = $this->getEventsCitiesTotal($request);
        $this->eventsCitiesSelected = $eventsCitiesCollection->first(function ($item) use ($request) {
            return $item->city_id == $request->session()->get('events.events_city');
        });

        return view('livewire.search-events-by-city');
    }
}
