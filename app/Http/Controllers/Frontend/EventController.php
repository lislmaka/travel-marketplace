<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
//use App\Models\EventCategory;
//use App\Models\EventCity;
//use App\Models\EventCountry;
//use App\Models\PivotEventCategory;
use App\Models\PivotEventOption;
use App\Models\Review;
use App\Models\Roadmap;
use App\Traits\EventGeneral;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Traits\DemoData;
use App\Traits\EventIndex;

/**
 * Class EventController
 * @package App\Http\Controllers\Frontend
 */
class EventController extends Controller
{
    use DemoData, EventIndex, EventGeneral;

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
