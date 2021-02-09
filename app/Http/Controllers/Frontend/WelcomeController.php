<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Traits\DemoData;

/**
 * Class WelcomeController
 * @package App\Http\Controllers\Frontend
 */
class WelcomeController extends Controller
{
    use DemoData;

    //

    /**
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $eventsAllCount = Event::where('active', true)->count();

        $eventsPopularCities = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsPopularCitiesCount = rand(100, 10000); //$eventsIdeas->count();

        $eventsPopularCountries = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsPopularCountriesCount = rand(100, 10000); //$eventsPopularDestinations->count();

        $eventsPopularCategories = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsPopularCategoriesCount = rand(100, 10000); //$eventsPopularVariants->count();

        $reviews = Review::where('active', true)
            ->inRandomOrder()
            ->where('rating', '>=', 4)
            ->limit(4)
            ->get();
        $countOfReviews = Review::where('active', true)->count();

        $view_data = array(
            'description' => 'Туристический маркетплейс. Впечатления разные, сервис – один!',
            'title' => config('app.name').' – туристический маркетплейс',

            'eventsAllCount' => $eventsAllCount,

            'eventsPopularCities' => $eventsPopularCities,
            'eventsPopularCitiesCount' => $eventsPopularCitiesCount,
            'eventsPopularCountries' => $eventsPopularCountries,
            'eventsPopularCountriesCount' => $eventsPopularCountriesCount,
            'eventsPopularCategories' => $eventsPopularCategories,
            'eventsPopularCategoriesCount' => $eventsPopularCategoriesCount,
            //'events' => $eventsPopularCities,

            'reviews' => $reviews,
            'countOfReviews' => $countOfReviews,
            'demo_faces' => DemoData::DemoFaces()
        );

        return view('site.frontend.welcome.layout', $view_data);
    }
}
