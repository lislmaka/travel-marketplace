<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventCity;
use App\Models\EventCountry;
use App\Models\PivotEventCategory;
use App\Models\PivotEventOption;
use App\Models\Review;
use App\Models\Roadmap;
use App\Traits\DemoData;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class EventController
 * @package App\Http\Controllers\Frontend
 */
class EventController extends Controller
{
    use DemoData;

    /**
     * @var string
     */
    private $eventsViewModeDefault = 'view-4';
    /**
     * @var string
     */
    private $eventsSortModeDefault = 'sort_1';

    /**
     * @var string
     */
    private $eventsCategoriesDefault = 'all';
    /**
     * @var string
     */
    private $eventsCountriesDefault = 'all';

    /**
     * @var string
     */
    private $eventsCitiesDefault = 'all';


    /**
     * @param $request
     * @param  null  $obj
     * @return array[]|\string[][]
     */
    private function breadcrumbs($request, $obj = null)
    {
        $breadcrumbs = array();

        if ($obj) {
            $breadcrumbs = array(
                array(
                    'url' => route('events.index'),
                    'title' => 'Каталог'
                ),
                array(
                    'url' => '',
                    'title' => $obj->country->name
                ),
                array(
                    'url' => '',
                    'title' => $obj->city->name
                ),
                array(
                    'url' => '',
                    'title' => $obj->name
                ),
            );
        } else {
            $breadcrumbs = array(
                array(
                    'url' => '',
                    'title' => 'Каталог'
                )
            );
            if ($request->session()->get('events.events_country') != $this->eventsCountriesDefault) {
                array_push($breadcrumbs, array(
                    'url' => '',
                    'title' => EventCountry::find($request->session()->get('events.events_country'))->name,
                ));
            }
            if ($request->session()->get('events.events_city') != $this->eventsCitiesDefault) {
                $cityObj = EventCity::find($request->session()->get('events.events_city'));

                if ($request->session()->get('events.events_country') == $this->eventsCountriesDefault) {
                    array_push($breadcrumbs, array(
                        'url' => '',
                        'title' => EventCountry::find($cityObj->country_id)->name,
                    ));
                }
                array_push($breadcrumbs, array(
                    'url' => '',
                    'title' => $cityObj->name,
                ));
            }
            if ($request->session()->get('events.events_category') != $this->eventsCategoriesDefault) {
                array_push($breadcrumbs, array(
                    'url' => '',
                    'title' => EventCategory::find($request->session()->get('events.events_category'))->name,
                ));
            }

        }

        return $breadcrumbs;
    }


    /**
     * @param $request
     * @return \string[][]
     */
    private function eventsViews($request)
    {
        return array(
//            'view_1' =>
//                array(
//                    'title' => 'Расширенный вариант',
//                    'url' => 'view_1',
//                    'symbol' => '',
//                    'active' => $request->session()->get('events.events_view_mode') == 'view_1' ? 'active' : '',
//                ),
            'view-2' =>
                array(
                    'title' => 'Список',
                    'url' => 'view-2',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_view_mode') == 'view-2' ? 'active' : '',
                ),
//            'view_3' =>
//                array(
//                    'title' => 'Плитка 2 колонки',
//                    'url' => 'view_3',
//                    'symbol' => '',
//                    'active' => $request->session()->get('events.events_view_mode') == 'view_3' ? 'active' : '',
//                ),
            'view-4' =>
                array(
                    'title' => 'Плитка 3 колонки',
                    'url' => 'view-4',
                    'symbol' => '<span class="badge bg-success">Удобно</span>',
                    'active' => $request->session()->get('events.events_view_mode') == 'view-4' ? 'active' : '',
                ),
//            'view_5' =>
//                array(
//                    'title' => 'Плитка 4 колонки',
//                    'url' => 'view_5',
//                    'symbol' => '',
//                    'active' => $request->session()->get('events.events_view_mode') == 'view_5' ? 'active' : '',
//                ),
        );
    }

    /**
     * @param $request
     * @return \string[][]
     */
    private function eventsSorts($request)
    {
        return array(
            'sort_1' =>
                array(
                    'title' => 'по убыванию цены',
                    'url' => 'sort_1',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_sort_mode') == 'sort_1' ? 'active' : '',
                ),
            'sort_2' =>
                array(
                    'title' => 'по возрастанию цены',
                    'url' => 'sort_2',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_sort_mode') == 'sort_2' ? 'active' : '',
                ),
            'sort_3' =>
                array(
                    'title' => 'по размеру скидки',
                    'url' => 'sort_3',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_sort_mode') == 'sort_3' ? 'active' : '',
                ),
            'sort_4' =>
                array(
                    'title' => 'по убыванию рейтинга',
                    'url' => 'sort_4',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_sort_mode') == 'sort_4' ? 'active' : '',
                ),
            'sort_5' =>
                array(
                    'title' => 'по возрастанию рейтинга',
                    'url' => 'sort_5',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_sort_mode') == 'sort_5' ? 'active' : '',
                ),
        );
    }

    /**
     * @param $request
     * @return array[]
     */
    private function eventsFilters($request)
    {
        return array(
            'all' =>
                array(
                    'title' => 'Все туры',
                    'hint' => '',
                    'url' => 'all',
                    'count' => number_format(rand(1, 100)),
                    'active' => $request->session()->get('projects.events_filter_mode') == 'all' ? 'active' : '',
                ),
            'filter_1' =>
                array(
                    'title' => 'Популярные направления',
                    'hint' => '',
                    'url' => 'filter_1',
                    'count' => number_format(rand(1, 100), 0, '', ','),
                    'active' => $request->session()->get('projects.events_filter_mode') == 'filter_1' ? 'active' : '',
                ),
            'filter_2' =>
                array(
                    'title' => 'Популярные варианты отдыха',
                    'hint' => '',
                    'url' => 'filter_2',
                    'count' => number_format(rand(1, 100), 0, '', ','),
                    'active' => $request->session()->get('projects.events_filter_mode') == 'filter_2' ? 'active' : '',
                ),
            'filter_3' =>
                array(
                    'title' => 'Идеи для новых открытий',
                    'hint' => '',
                    'url' => 'filter_3',
                    'count' => number_format(rand(1, 100), 0, '', ','),
                    'active' => $request->session()->get('projects.events_filter_mode') == 'filter_3' ? 'active' : '',
                ),
        );
    }

    /**
     * @param  Request  $request
     * @param $view
     * @return \Illuminate\Http\RedirectResponse
     */
    public function viewMode(Request $request, $view)
    {
        if (array_key_exists($view, $this->eventsViews($request))) {
            $request->session()->put('events.events_view_mode', $view);
        } else {
            $request->session()->put('events.events_view_mode', $this->eventsViewModeDefault);
        }


        return redirect()->route('events.index');
    }

    /**
     * @param  Request  $request
     * @param $sort
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sortMode(Request $request, $sort)
    {
        $request->session()->put('events.events_sort_mode', $sort);

        return redirect()->route('events.index');
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function defaultSettings(Request $request)
    {
        $request->session()->put('events.events_country', $this->eventsCountriesDefault);
        $request->session()->put('events.events_city', $this->eventsCitiesDefault);
        $request->session()->put('events.events_category', $this->eventsCategoriesDefault);

        return redirect()->route('events.index');
    }


    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eventsSeenClean(Request $request)
    {
        $request->session()->forget('events.events_seen');
        return redirect()->back();
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eventsCompareClean(Request $request)
    {
        $request->session()->forget('events.events_compare');
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showEventsByCategory(Request $request, $id)
    {
        $request->session()->put('events.events_category', $id);

        return redirect()->route('events.index');
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showEventsByCountry(Request $request, $id)
    {
        $request->session()->put('events.events_country', $id);

        return redirect()->route('events.index');
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showEventsByCity(Request $request, $id)
    {
        $request->session()->put('events.events_city', $id);

        return redirect()->route('events.index');
    }

    /**
     * Избыточный блок
     * Данный блок можно убрать при условии неизменности входящих массивов данных
     * таких как массив сортировки, массив видов отображения каталога
     * @param $request
     */
    private function checkSessionValues($request)
    {
        //
        // catalogs_view_mode
        //
        if ($request->session()->has('events.events_view_mode')) {
            if (!array_key_exists($request->session()->get('events.events_view_mode'),
                $this->eventsViews($request))) {
                $request->session()->put('events.events_view_mode', $this->eventsViewModeDefault);
            }
        } else {
            $request->session()->put('events.events_view_mode', $this->eventsViewModeDefault);
        }

        //
        // catalogs_sort_mode
        //
        if ($request->session()->has('events.events_sort_mode')) {
            if (!array_key_exists($request->session()->get('events.events_sort_mode'),
                $this->eventsSorts($request))) {
                $request->session()->put('events.events_sort_mode', $this->eventsSortModeDefault);
            }
        } else {
            $request->session()->put('events.events_sort_mode', $this->eventsSortModeDefault);
        }

        //
        // events_category
        //
        if ($request->session()->has('events.events_category')) {
            if (EventCategory::where('id', $request->session()->get('events.events_category'))->doesntExist()) {
                $request->session()->put('events.events_category', $this->eventsCategoriesDefault);
            }
        } else {
            $request->session()->put('events.events_category', $this->eventsCategoriesDefault);
        }

        //
        // events_country
        //
        if ($request->session()->has('events.events_country')) {
            if (Event::where('country_id', $request->session()->get('events.events_country'))->doesntExist()) {
                $request->session()->put('events.events_country', $this->eventsCountriesDefault);
            }
        } else {
            $request->session()->put('events.events_country', $this->eventsCountriesDefault);
        }

        //
        // events_city
        //
        if ($request->session()->has('events.events_city')) {
            if (Event::where('city_id', $request->session()->get('events.events_city'))->doesntExist()) {
                $request->session()->put('events.events_city', $this->eventsCitiesDefault);
            }
        } else {
            $request->session()->put('events.events_city', $this->eventsCitiesDefault);
        }
    }


    /**
     * @param $request
     * @return int
     */
    private function countPaginate($request)
    {
        if ($request->session()->get('events.events_view_mode') == 'view_3') {
            return 10;
        }
        if ($request->session()->get('events.events_view_mode') == 'view_4') {
            return 9;
        }
        if ($request->session()->get('events.events_view_mode') == 'view_5') {
            return 12;
        }
    }


    /**
     * @param $request
     * @param $event
     */
    private function setEventsSeen($request, $event)
    {
        if ($request->session()->has('events.events_seen')) {
            if (!in_array($event, $request->session()->get('events.events_seen'))) {
                if (count($request->session()->get('events.events_seen')) >= 4) {
                    $request->session()->put('events.events_seen',
                        array_slice($request->session()->get('events.events_seen'), 0, 3));
                }
                $request->session()->push('events.events_seen', $event);
            }
        } else {
            $request->session()->push('events.events_seen', $event);
        }
    }

    /**
     * @param  Request  $request
     * @param $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $event)
    {

        if (Event::where('id', $event)->where('active', true)->doesntExist()) {
            abort(404);
        }

        $this->setEventsSeen($request, $event);

        $eventInfo = Event::where('active', true)->find($event);

        /*
         *
         */
        $roadmaps = Roadmap::where('event_id', $event)->orderBy('section', 'ASC')->get();

        $eventOptions = PivotEventOption::where('event_id', $event)
            ->join('event_options', 'event_options.id', '=', 'pivot_event_options.option_id');
        $eventOptions = $eventOptions->get();

        $similarAuthor = Event::where('active', true)->limit(3)->inRandomOrder()->get();
        $similarCity = Event::where('active', true)->limit(3)->inRandomOrder()->get();
        $reviews = Review::where('active', true)->limit(4)->inRandomOrder()->get();

        $eventOptionsPrice = $eventOptions->filter(function ($value, $key) {
            return $value->price;
        })->values();
        $eventOptionsFree = $eventOptions->filter(function ($value, $key) {
            return $value->free;
        })->values();
        //dd($eventOptionsJsonFree);

        $viewData = array(
            'description' => $eventInfo->short_description,
            'title' => $eventInfo->name,
            'breadcrumbs' => $this->breadcrumbs($request, $eventInfo),
            'event_info' => $eventInfo,
            //'event_options' => $eventOptions,
            'event_options_price' => $eventOptionsPrice->toJson(),
            'event_options_free' => $eventOptionsFree->toJson(),
            'event_options_json' => $eventOptions->toJson(),
            'similar_author' => $similarAuthor,
            'similar_city' => $similarCity,
            'reviews' => $reviews,
            //
            'roadmaps' => $roadmaps,
            'demo_images' => DemoData::DemoImages(),
            'demo_faces' => DemoData::DemoFaces()
        );

        return view('site.frontend.event.layout', $viewData);
    }

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

    /**
     * @param  Request  $request
     * @param  Faker  $faker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Faker $faker)
    {
        $this->checkSessionValues($request);
        $this->countPaginate($request);

        //$events = $this->getEvents($request);
        $eventsCategoriesCollection = $this->getCountOfEventsByCategories($request);
        $eventsCitiesCollection = $this->getCountOfEventsByCities($request);
        $eventsCountriesCollection = $this->getCountOfEventsByCountries($request);

        $viewData = array(
            'description' => 'Каталог',
            'title' => 'Каталог',
            'breadcrumbs' => $this->breadcrumbs($request),
            'demo_images' => DemoData::DemoImages(),
            'demo_faces' => DemoData::DemoFaces(),

            // Catalog
            'events' => $this->getEvents($request),

            // tour operator
            'tour_operators' => $this->getCountOfEventsByTourOperators($request),

            // Cities
            'events_cities_collection' => $eventsCitiesCollection,
            'events_cities_total' => $this->getEventsCitiesTotal($request),
            'events_cities_selected' => $eventsCitiesCollection->first(function ($item) use ($request) {
                return $item->city_id == $request->session()->get('events.events_city');
            }),

            // Categories
            'events_categories_collection' => $eventsCategoriesCollection,
            'events_categories_total' => $this->getEventsCategoriesTotal($request),
            'events_categories_selected' => $eventsCategoriesCollection->first(function ($item) use ($request) {
                return $item->category_id == $request->session()->get('events.events_category');
            }),

            // Countries
            'events_countries_collection' => $eventsCountriesCollection,
            'events_countries_total' => $this->getEventsCountriesTotal($request),
            'events_countries_selected' => $eventsCountriesCollection->first(function ($item) use ($request) {
                return $item->country_id == $request->session()->get('events.events_country');
            }),

            // Filters
            'events_view_mode' => $request->session()->get('events.events_view_mode'),
            'events_sort_mode' => $request->session()->get('events.events_sort_mode'),
            'events_views' => $this->eventsViews($request),
            'events_sorts' => $this->eventsSorts($request),
            'events_filters' => $this->eventsFilters($request),
        );

        return view('site.frontend.events.layout', $viewData);
    }
}
