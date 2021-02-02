<?php

namespace App\Http\Livewire;

use App\Models\EventCity;
use App\Models\EventCountry;
use Livewire\Component;

class SearchEvents extends Component
{
    public $query = null;
    public $events_countries;
    public $events_cities;

    public function mount()
    {
        $this->clearSearch();
    }

    public function clearSearch()
    {
        $this->query = null;
        $this->events_countries = [];
        $this->events_cities = [];
    }

    public function render()
    {
        if ($this->query) {
            $query = '%'.$this->query.'%';
            $this->events_countries = EventCountry::where('name', 'like', $query)->get();
            $this->events_cities = EventCity::where('name', 'like', $query)->get();
        }
        return view('livewire.search-events');
    }
}
