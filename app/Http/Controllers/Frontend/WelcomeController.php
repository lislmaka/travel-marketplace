<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $events = Event::where('active', true)->limit(4)->get();

        $view_data = array(
            'description' => 'Laravel 8 - проба пера',
            'events' => $events,
            'title' => 'Laravel 8 - проба пера',
        );

        return view('site.frontend.welcome.layout', $view_data);
    }
}
