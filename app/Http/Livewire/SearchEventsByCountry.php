<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventCity;
use App\Models\PivotEventCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Livewire\Component;

class SearchEventsByCountry extends Component
{
    public $eventsCountriesCollection = [];
    public $eventsCountriesTotal = 0;
    public $eventsCountriesSelected = null;

    public $otherParamsSelected = [];

    public $querySearch = null;

    private $eventsCitiesDefault = 'all';
    private $eventsCategoriesDefault = 'all';

    public function clearSearch()
    {
        $this->reset('querySearch');
    }

    private function getEventsCountriesTotal($request)
    {
        $eventsCountriesTotal = Event::where('active', true);
        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->eventsCategoriesDefault) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $eventsCountriesTotal->whereIn('id', $event_ids);
        }
        /*
         * Если выбран город
         */
        if ($request->session()->get('events.events_city') != $this->eventsCitiesDefault) {
            $eventsCountriesTotal->where('city_id', $request->session()->get('events.events_city'));
        }

        return $eventsCountriesTotal->count();
    }

    private function getCountOfEventsByCountries($request)
    {
        $eventsCountriesCollection = Event::where('events.active', true)
            ->select(DB::raw('count(events.id) as count, events.country_id'))
            ->join('event_countries', 'event_countries.id', '=', 'events.country_id')
            ->groupBy('country_id')
            ->orderByRaw('event_countries.name asc');
        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->eventsCategoriesDefault) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $eventsCountriesCollection->whereIn('events.id', $event_ids);
        }
        /*
         * Если выбран город
         */
        if ($request->session()->get('events.events_city') != $this->eventsCitiesDefault) {
            $eventsCountriesCollection->where('city_id', $request->session()->get('events.events_city'));
        }
        /*
         * Если введен запрос $queryString
         */
        if ($this->querySearch) {
            $eventsCountriesCollection->where('event_countries.name', 'like', '%'.$this->querySearch.'%');
        }

        return $eventsCountriesCollection->get();
    }

    private function checkIfOtherParamsSelected()
    {
        if (session('events.events_city') != $this->eventsCitiesDefault) {
            array_push($this->otherParamsSelected, array(
                'key' => 'events_city',
                'message' => 'Выбран город',
                'info' => EventCity::where('id', session('events.events_city'))->first()->toArray()
            ));
        }
        if (session('events.events_category') != $this->eventsCategoriesDefault) {
            array_push($this->otherParamsSelected, array(
                'key' => 'events_category',
                'message' => 'Выбрана категория',
                'info' => EventCategory::where('id', session('events.events_category'))->first()->toArray()
            ));
        }
        //dd($this->otherParamsSelected);
    }

    public function render(Request $request)
    {
        $this->checkIfOtherParamsSelected();

        $eventsCountriesCollection = $this->getCountOfEventsByCountries($request);

        $this->eventsCountriesCollection = $eventsCountriesCollection;
        $this->eventsCountriesTotal = $this->getEventsCountriesTotal($request);
        $this->eventsCountriesSelected = $eventsCountriesCollection->first(function ($item) use ($request) {
            return $item->country_id == $request->session()->get('events.events_country');
        });

        return view('livewire.search-events-by-country');
    }
}
