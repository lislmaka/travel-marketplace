<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(Request $request)
    {

        $view_data = array(
            'description' => 'Laravel 8 - проба пера',
            'title' => 'Laravel 8 - проба пера',
        );

        return view('site.frontend.welcome.layout', $view_data);
    }
}
