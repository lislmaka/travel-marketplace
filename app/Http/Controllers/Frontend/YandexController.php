<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\PivotEventCategory;
use App\Models\Roadmap;
use Illuminate\Http\Request;

class YandexController extends Controller
{

    public function getRoadmap(Request $request)
    {

        $roadmaps = Roadmap::where('event_id', $request->input('event_id'));
        $roadmaps = $roadmaps->get();

        $map_info = array(
            'type' => 'FeatureCollection',
            'features' => array(),
        );

        foreach ($roadmaps as $roadmap) {
            $coordinates_array = json_decode($roadmap->coordinates, true);

            $map_info['features'][] = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => array(
                        $coordinates_array['latitude'],
                        $coordinates_array['longitude']
                    ),
                ),
                'properties' => array(
                    'balloonContentHeader' => $roadmap->title,
                    'balloonContentBody' => $roadmap->description,
                    'iconContent' => $roadmap->section
                ),
                'options' => array(
                    'preset' => 'islands#blueIcon',
                ),
            );
        }


        $json_string = json_encode($map_info);
        echo $json_string;
    }

    public function getCity(Request $request)
    {

        $events = Event::where('active', true);
        //$events->where('city_id', 1);

        if ($request->has('event_id')) {
            $events->where('id', $request->input('event_id'));
        }

        $events = $events->get();

        $map_info = array(
            'type' => 'FeatureCollection',
            'features' => array(),
        );

        foreach ($events as $event) {
            $coordinates_array = json_decode($event->coordinates, true);

            $preset = $event->old_price ? 'islands#redStretchyIcon' : 'islands#blueStretchyIcon';

            $map_info['features'][] = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => array(
                        $coordinates_array['latitude'],
                        $coordinates_array['longitude']
                    ),
                ),
                'properties' => array(
                    'iconContent' => number_format($event->price, 0, '', '.').' <i class="fas fa-ruble-sign"></i> '
                ),
                'options' => array(
                    'preset' => $preset,
                ),
            );
        }


        $json_string = json_encode($map_info);
        echo $json_string;
    }

    public function getAll(Request $request)
    {

        $events = Event::where('active', true);

        /*
         * Если указана категория
         */
        if ($request->session()->has('events.events_category') && $request->session()->get('events.events_category') != 'all') {
            $event_ids = PivotEventCategory::select('event_id')
                ->where('category_id', $request->session()->get('events.events_category'))->get();
            $events->whereIn('id', $event_ids);
        }
        /*
         * Если указана страна
         */
        if ($request->session()->has('events.events_country') && $request->session()->get('events.events_country') != 'all') {
            $events->where('country_id', $request->session()->get('events.events_country'));
        }
        /*
         * Если указан город
         */
        if ($request->session()->has('events.events_city') && $request->session()->get('events.events_city') != 'all') {
            $events->where('city_id', $request->session()->get('events.events_city'));
        }

        $events = $events->get();

        $map_info = array(
            'type' => 'FeatureCollection',
            'features' => array(),
        );

        foreach ($events as $event) {
            $coordinates_array = json_decode($event->coordinates, true);

            $preset = $event->old_price ? 'islands#redStretchyIcon' : 'islands#blueStretchyIcon';

            $map_info['features'][] = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => array(
                        $coordinates_array['latitude'],
                        $coordinates_array['longitude']
                    ),
                ),
                'properties' => array(
                    'balloonContentHeader' => $event->name,
                    'balloonContentBody' => $event->short_description,
                    'balloonContentFooter' => '<a href="'.route('events.show',
                            ['event' => $event->id]).'" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Посмотреть</a>',
                    'iconContent' => number_format($event->price, 0, '', '.').' <i class="fas fa-ruble-sign"></i> '
                ),
                'options' => array(
                    'preset' => $preset,
                ),
            );
        }


        $json_string = json_encode($map_info);
        echo $json_string;
    }
}
