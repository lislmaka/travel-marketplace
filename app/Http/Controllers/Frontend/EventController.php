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
    private $events_view_mode_default = 'view_4';
    /**
     * @var string
     */
    private $events_sort_mode_default = 'sort_1';

    /**
     * @var string
     */
    private $events_categories_default = 'all';
    /**
     * @var string
     */
    private $events_countries_default = 'all';

    /**
     * @var string
     */
    private $events_cities_default = 'all';


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
            if ($request->session()->get('events.events_country') != $this->events_countries_default) {
                array_push($breadcrumbs, array(
                    'url' => '',
                    'title' => EventCountry::find($request->session()->get('events.events_country'))->name,
                ));
            }
            if ($request->session()->get('events.events_city') != $this->events_cities_default) {
                array_push($breadcrumbs, array(
                    'url' => '',
                    'title' => EventCity::find($request->session()->get('events.events_city'))->name,
                ));
            }
            if ($request->session()->get('events.events_category') != $this->events_categories_default) {
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
        $events_views = array(
            'view_1' =>
                array(
                    'title' => 'Расширенный вариант',
                    'url' => 'view_1',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_view_mode') == 'view_1' ? 'active' : '',
                ),
            'view_2' =>
                array(
                    'title' => 'Краткий вариант',
                    'url' => 'view_2',
                    'symbol' => '<span class="badge bg-success">best</span>',
                    'active' => $request->session()->get('events.events_view_mode') == 'view_2' ? 'active' : '',
                ),
            'view_3' =>
                array(
                    'title' => 'Плитка 2 колонки',
                    'url' => 'view_3',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_view_mode') == 'view_3' ? 'active' : '',
                ),
            'view_4' =>
                array(
                    'title' => 'Плитка 3 колонки',
                    'url' => 'view_4',
                    'symbol' => '<span class="badge bg-success">best</span>',
                    'active' => $request->session()->get('events.events_view_mode') == 'view_4' ? 'active' : '',
                ),
            'view_5' =>
                array(
                    'title' => 'Плитка 4 колонки',
                    'url' => 'view_5',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_view_mode') == 'view_5' ? 'active' : '',
                ),
        );

        return $events_views;

    }

    /**
     * @param $request
     * @return \string[][]
     */
    private function eventsSorts($request)
    {
        $events_sorts = array(
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

        return $events_sorts;

    }

    /**
     * @param $request
     * @return array[]
     */
    private function eventsFilters($request)
    {
        $events_filters = array(
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

        return $events_filters;

    }

    /**
     * @param  Request  $request
     * @param $view
     * @return \Illuminate\Http\RedirectResponse
     */
    public function viewMode(Request $request, $view)
    {
        $request->session()->put('events.events_view_mode', $view);

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
        $request->session()->put('events.events_country', $this->events_countries_default);
        $request->session()->put('events.events_city', $this->events_cities_default);
        $request->session()->put('events.events_category', $this->events_categories_default);

        return redirect()->route('events.index');
    }

    /**
     *
     */
    public function eventsClean(Request $request)
    {
        $request->session()->forget('events.events_seen');
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
                $request->session()->put('events.events_view_mode', $this->events_view_mode_default);
            }
        } else {
            $request->session()->put('events.events_view_mode', $this->events_view_mode_default);
        }

        //
        // catalogs_sort_mode
        //
        if ($request->session()->has('events.events_sort_mode')) {
            if (!array_key_exists($request->session()->get('events.events_sort_mode'),
                $this->eventsSorts($request))) {
                $request->session()->put('events.events_sort_mode', $this->events_sort_mode_default);
            }
        } else {
            $request->session()->put('events.events_sort_mode', $this->events_sort_mode_default);
        }

        //
        // events_category
        //
        if ($request->session()->has('events.events_category')) {
            if (EventCategory::where('id', $request->session()->get('events.events_category'))->doesntExist()) {
                $request->session()->put('events.events_category', $this->events_categories_default);
            }
        } else {
            $request->session()->put('events.events_category', $this->events_categories_default);
        }

        //
        // events_country
        //
        if ($request->session()->has('events.events_country')) {
            if (Event::where('country_id', $request->session()->get('events.events_country'))->doesntExist()) {
                $request->session()->put('events.events_country', $this->events_countries_default);
            }
        } else {
            $request->session()->put('events.events_country', $this->events_countries_default);
        }

        //
        // events_city
        //
        if ($request->session()->has('events.events_city')) {
            if (Event::where('city_id', $request->session()->get('events.events_city'))->doesntExist()) {
                $request->session()->put('events.events_city', $this->events_cities_default);
            }
        } else {
            $request->session()->put('events.events_city', $this->events_cities_default);
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
        if($request->session()->has('events.events_seen')) {
            if (!in_array($event, $request->session()->get('events.events_seen'))) {
                if(count($request->session()->get('events.events_seen')) >= 4) {
                    $request->session()->put('events.events_seen', array_slice($request->session()->get('events.events_seen'), 0, 3));
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
        /*
         *
         */
        //$request->session()->push('events.events_seen', 'developers');

        if (Event::where('id', $event)->doesntExist()) {
            abort(404);
        }

        $this->setEventsSeen($request, $event);

        $event_info = Event::where('active', true)->find($event);

        /*
         *
         */
        $event_options = PivotEventOption::where('event_id', $event)
            ->join('event_options', 'event_options.id', '=', 'pivot_event_options.option_id');
        $event_options = $event_options->get();

        $similar_events = Event::where('active', true)->limit(4)->get();
        $reviews = Review::where('active', true)->limit(4)->get();

        $view_data = array(
            'description' => $event_info->short_description,
            'title' => $event_info->name,
            'breadcrumbs' => $this->breadcrumbs($request, $event_info),
            'event_info' => $event_info,
            'event_options' => $event_options,
            'event_options_json' => $event_options->toJson(),
            'similar_events' => $similar_events,
            'reviews' => $reviews,
            'demo_images' => DemoData::DemoImages(),
            'demo_faces' => DemoData::DemoFaces()
        );

        return view('site.frontend.event.layout', $view_data);
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

        /*--------------------------------------------------------------------------------------------------------------
         * Формирования каталога
         --------------------------------------------------------------------------------------------------------------*/
        $events = Event::where('active', true);

        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->events_categories_default) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $events->whereIn('id', $event_ids);
        }
        /*
         * Если выбрана страна
         */
        if ($request->session()->get('events.events_country') != $this->events_countries_default) {
            $events->where('country_id', $request->session()->get('events.events_country'));
        }
        /*
         * Если выбран город
         */
        if ($request->session()->get('events.events_city') != $this->events_cities_default) {
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

        $events = $events->paginate($this->countPaginate($request));

        /*--------------------------------------------------------------------------------------------------------------
         * Кол-во туров по категориям
         --------------------------------------------------------------------------------------------------------------*/
        $events_categories_collection = PivotEventCategory::select(DB::raw('count(event_id) as event_count, category_id'))
            ->join('events', 'events.id', '=', 'pivot_event_categories.event_id')
            ->join('event_categories', 'event_categories.id', '=', 'pivot_event_categories.category_id')
            ->where('events.active', true)
            ->groupBy('category_id')
            ->orderByRaw('event_categories.name asc');
        if ($request->session()->has('events.events_country') && $request->session()->get('events.events_country') != $this->events_countries_default) {
            $events_categories_collection->where('events.country_id',
                $request->session()->get('events.events_country'));
        }
        if ($request->session()->has('events.events_city') && $request->session()->get('events.events_city') != $this->events_cities_default) {
            $events_categories_collection->where('events.city_id', $request->session()->get('events.events_city'));
        }
        $events_categories_collection = $events_categories_collection->get();



        /*--------------------------------------------------------------------------------------------------------------
         * Кол-во туров по странам
         --------------------------------------------------------------------------------------------------------------*/
        $events_countries_collection = Event::where('events.active', true)
            ->select(DB::raw('count(events.id) as count, events.country_id'))
            ->join('event_countries', 'event_countries.id', '=', 'events.country_id')
            ->groupBy('country_id')
            ->orderByRaw('event_countries.name asc');
        if ($request->session()->get('events.events_category') != $this->events_categories_default) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $events_countries_collection->whereIn('events.id', $event_ids);
        }
        if ($request->session()->get('events.events_city') != $this->events_cities_default) {
            $events_countries_collection->where('city_id', $request->session()->get('events.events_city'));
        }
        $events_countries_collection = $events_countries_collection->get();

        /*--------------------------------------------------------------------------------------------------------------
         * Кол-во туров по городам
         --------------------------------------------------------------------------------------------------------------*/
        $events_cities_collection = Event::where('events.active', true)
            ->select(DB::raw('count(events.id) as count, city_id, events.country_id'))
            ->join('event_cities', 'event_cities.id', '=', 'events.city_id')
            ->groupBy('city_id')
            ->groupBy('country_id')
            ->orderByRaw('event_cities.name asc');
        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->events_categories_default) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $events_cities_collection->whereIn('events.id', $event_ids);
        }
        /*
         * Если выбрана страна
         */
        if ($request->session()->get('events.events_country') != $this->events_countries_default) {
            $events_cities_collection->where('events.country_id', $request->session()->get('events.events_country'));
        }

        $events_cities_collection = $events_cities_collection->get();

        /*--------------------------------------------------------------------------------------------------------------
         * Кол-во событий для категорий
         --------------------------------------------------------------------------------------------------------------*/
        $events_categories_total = Event::where('active', true);
        if ($request->session()->get('events.events_country') != $this->events_countries_default) {
            $events_categories_total->where('country_id', $request->session()->get('events.events_country'));
        }
        if ($request->session()->get('events.events_city') != $this->events_cities_default) {
            $events_categories_total->where('city_id', $request->session()->get('events.events_city'));
        }
        $events_categories_total = $events_categories_total->count();

        /*--------------------------------------------------------------------------------------------------------------
         * Кол-во событий для стран
         --------------------------------------------------------------------------------------------------------------*/
        $events_cities_total = Event::where('active', true);
        /*
         * Если указана страна
         */
        if ($request->session()->get('events.events_country') != $this->events_countries_default) {
            $events_cities_total->where('country_id', $request->session()->get('events.events_country'));
        }
        /*
         * Если указана категория
         */
        if ($request->session()->get('events.events_category') != $this->events_categories_default) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $events_cities_total->whereIn('id', $event_ids);
        }
        $events_cities_total = $events_cities_total->count();


        /*--------------------------------------------------------------------------------------------------------------
         * Кол-во событий для стран
         --------------------------------------------------------------------------------------------------------------*/
        $events_countries_total = Event::where('active', true);
        /*
         * Если выбрана категория
         */
        if ($request->session()->get('events.events_category') != $this->events_categories_default) {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $events_countries_total->whereIn('id', $event_ids);
        }
        if ($request->session()->get('events.events_city') != $this->events_cities_default) {
            $events_countries_total->where('city_id', $request->session()->get('events.events_city'));
        }

        $events_countries_total = $events_countries_total->count();


        $view_data = array(
            'description' => 'Каталог',
            'title' => 'Каталог',
            'breadcrumbs' => $this->breadcrumbs($request),
            'demo_images' => DemoData::DemoImages(),
            'demo_faces' => DemoData::DemoFaces(),

            // Catalog
            'events' => $events,

            // Cities
            'events_cities_collection' => $events_cities_collection,
            'events_cities_total' => $events_cities_total,
            'events_cities_selected' => $events_cities_collection->first(function ($item) use ($request) {
                return $item->city_id == $request->session()->get('events.events_city');
            }),

            // Categories
            'events_categories_collection' => $events_categories_collection,
            'events_categories_total' => $events_categories_total,
            'events_categories_selected' => $events_categories_collection->first(function ($item) use ($request) {
                return $item->category_id == $request->session()->get('events.events_category');
            }),

            // Countries
            'events_countries_collection' => $events_countries_collection,
            'events_countries_total' => $events_countries_total,
            'events_countries_selected' => $events_countries_collection->first(function ($item) use ($request) {
                return $item->country_id == $request->session()->get('events.events_country');
            }),

            // Filters
            'events_view_mode' => $request->session()->get('events.events_view_mode'),
            'events_sort_mode' => $request->session()->get('events.events_sort_mode'),
            'events_views' => $this->eventsViews($request),
            'events_sorts' => $this->eventsSorts($request),
            'events_filters' => $this->eventsFilters($request),
        );

        return view('site.frontend.events.layout', $view_data);
    }
}
