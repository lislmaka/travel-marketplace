<?php

namespace App\Traits;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventCity;
use App\Models\EventCountry;
use Illuminate\Http\Request;

trait EventGeneral
{
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
            'view-2' =>
                array(
                    'title' => 'Список',
                    'url' => 'view-2',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_view_mode') == 'view-2' ? 'active' : '',
                ),
            'view-4' =>
                array(
                    'title' => 'Плитка',
                    'url' => 'view-4',
                    'symbol' => '',
                    'active' => $request->session()->get('events.events_view_mode') == 'view-4' ? 'active' : '',
                ),
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
}
