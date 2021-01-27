<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Traits\DemoData;

class WelcomeController extends Controller
{
    use DemoData;

    //
    public function index(Request $request)
    {
        $eventsAllCount = Event::where('active', true)->count();

        $eventsIdeas = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsIdeasCount = $eventsIdeas->count();
        $eventsPopularDestinations = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsPopularDestinationsCount = $eventsPopularDestinations->count();
        $eventsPopularVariants = Event::where('active', true)->inRandomOrder()->limit(4)->get();
        $eventsPopularVariantsCount = $eventsPopularVariants->count();

        $reviews = Review::where('active', true)
            ->inRandomOrder()
            ->where('rating', '>=', 4)
            ->limit(4)
            ->get();
        $countOfReviews = Review::where('active', true)->count();

        $view_data = array(
            'description' => 'Laravel 8 - проба пера',
            'title' => 'Laravel 8 - проба пера',

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
