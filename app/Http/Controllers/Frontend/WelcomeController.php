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

        $eventsIdeas = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsIdeasCount = rand(100, 10000); //$eventsIdeas->count();
        $eventsPopularDestinations = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsPopularDestinationsCount = rand(100, 10000); //$eventsPopularDestinations->count();
        $eventsPopularVariants = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsPopularVariantsCount = rand(100, 10000); //$eventsPopularVariants->count();

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

            'eventsIdeas' => $eventsIdeas,
            'eventsIdeasCount' => $eventsIdeasCount,
            'eventsPopularDestinations' => $eventsPopularDestinations,
            'eventsPopularDestinationsCount' => $eventsPopularDestinationsCount,
            'eventsPopularVariants' => $eventsPopularVariants,
            'eventsPopularVariantsCount' => $eventsPopularVariantsCount,

            'reviews' => $reviews,
            'countOfReviews' => $countOfReviews,
            'demo_faces' => DemoData::DemoFaces()
        );

        return view('site.frontend.welcome.layout', $view_data);
    }
}
