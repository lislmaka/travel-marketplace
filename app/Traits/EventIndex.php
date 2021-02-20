<?php

namespace App\Traits;

use App\Models\Event;
use App\Models\PivotEventCategory;
use Illuminate\Support\Facades\DB;

trait EventIndex
{
    /**
     * Формирования каталога туров
     *
     * @param $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getEvents($request)
    {
        $events = Event::where('active', true);

        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->eventsCategoriesDefault) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $events->whereIn('id', $event_ids);
        }

        /*
         * Если выбрана страна
         */
        if ($request->session()->get('events.events_country') != $this->eventsCountriesDefault) {
            $events->where('country_id', $request->session()->get('events.events_country'));
        }

        /*
         * Если выбран город
         */
        if ($request->session()->get('events.events_city') != $this->eventsCitiesDefault) {
            $events->where('city_id', $request->session()->get('events.events_city'));
        }

        /*
         * Сортировка
         */
        if ($request->session()->get('events.events_sort_mode') == 'sort_1') {
            $events->orderBy('price', 'desc');
        }
        if ($request->session()->get('events.events_sort_mode') == 'sort_2') {
            $events->orderBy('price', 'asc');
        }
        if ($request->session()->get('events.events_sort_mode') == 'sort_3') {
            $events->orderByRaw('(100 - (price * 100) / old_price) desc');
        }
        if ($request->session()->get('events.events_sort_mode') == 'sort_4') {
            $events->orderBy('rating', 'desc');
        }
        if ($request->session()->get('events.events_sort_mode') == 'sort_5') {
            $events->orderBy('rating', 'asc');
        }

        return $events->paginate($this->countPaginate($request));
    }

    /**
     * @param $request
     * @return \Illuminate\Support\Collection
     */
    private function getCountOfEventsByTourOperators($request)
    {
        $eventsTourOperatorsCollection = Event::select(DB::raw('count(user_id) as user_count, user_id'))
            ->where('active', true)
            ->groupBy('user_id')
            ->orderBy('user_count', 'DESC');
        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->eventsCategoriesDefault) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $eventsTourOperatorsCollection->whereIn('id', $event_ids);
        }
        /*
         * Если выбрана страна
         */
        if ($request->session()->get('events.events_country') != $this->eventsCountriesDefault) {
            $eventsTourOperatorsCollection->where('country_id', $request->session()->get('events.events_country'));
        }

        /*
         * Если выбран город
         */
        if ($request->session()->get('events.events_city') != $this->eventsCitiesDefault) {
            $eventsTourOperatorsCollection->where('city_id', $request->session()->get('events.events_city'));
        }

        return $eventsTourOperatorsCollection->get();
    }

    /**
     * Кол-во туров по категориям
     *
     * @param $request
     * @return \Illuminate\Support\Collection
     */
    private function getCountOfEventsByCategories($request)
    {

        $eventsCategoriesCollection = PivotEventCategory::select(DB::raw('count(event_id) as event_count, category_id'))
            ->join('events', 'events.id', '=', 'pivot_event_categories.event_id')
            ->join('event_categories', 'event_categories.id', '=', 'pivot_event_categories.category_id')
            ->where('events.active', true)
            ->groupBy('category_id')
            ->orderByRaw('event_categories.name asc');
        /*
         * Если выбрана страна
         */
        if ($request->session()->has('events.events_country') && $request->session()->get('events.events_country') != $this->eventsCountriesDefault) {
            $eventsCategoriesCollection->where('events.country_id',
                $request->session()->get('events.events_country'));
        }
        /*
         * Если выбран город
         */
        if ($request->session()->has('events.events_city') && $request->session()->get('events.events_city') != $this->eventsCitiesDefault) {
            $eventsCategoriesCollection->where('events.city_id', $request->session()->get('events.events_city'));
        }
        return $eventsCategoriesCollection->get();
    }

    /**
     * Общее кол-во событий для всех категорий
     *
     * @param $request
     * @return int
     */
    private function getEventsCategoriesTotal($request)
    {
        $eventsCategoriesTotal = Event::where('active', true);
        /*
         * Если выбрана страна
         */
        if ($request->session()->get('events.events_country') != $this->eventsCountriesDefault) {
            $eventsCategoriesTotal->where('country_id', $request->session()->get('events.events_country'));
        }
        /*
         * Если выбран город
         */
        if ($request->session()->get('events.events_city') != $this->eventsCitiesDefault) {
            $eventsCategoriesTotal->where('city_id', $request->session()->get('events.events_city'));
        }
        return $eventsCategoriesTotal->count();
    }

    /**
     * Кол-во туров по городам
     *
     * @param $request
     * @return Event[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
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

        return $eventsCitiesCollection->get();
    }

    /**
     * Общее кол-во событий для всех городом
     *
     * @param $request
     * @return int
     */
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

    /**
     * Кол-во туров по странам
     *
     * @param $request
     * @return Event[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
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
        return $eventsCountriesCollection->get();
    }

    /**
     * Общее кол-во событий для всех стран
     * @param $request
     * @return int
     */
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
}
