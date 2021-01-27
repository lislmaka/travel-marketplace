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
        $events = Event::where('active', true)->limit(4)->get();
        $reviews = Review::where('active', true)
            ->inRandomOrder()
            ->where('rating', '>=', 4)
            ->limit(4)
            ->get();
        $countOfReviews = Review::where('active', true)->count();

        $view_data = array(
            'description' => 'Laravel 8 - проба пера',
            'title' => 'Laravel 8 - проба пера',
            'events' => $events,
            'reviews' => $reviews,
            'countOfReviews' => $countOfReviews,
            'demo_faces' => DemoData::DemoFaces()
        );

        return view('site.frontend.welcome.layout', $view_data);
    }
}
