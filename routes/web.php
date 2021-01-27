<?php

use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

// Set locale
Route::get('locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ru'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    App::setLocale($locale);

    return Redirect::to(URL::to(URL::previous()));
    //return redirect(url(URL::previous()));

})->name('set.locale');


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Event
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// Pages routes
Route::get('/{page_category}/{page_info?}', [PageController::class, 'index'])->name('pages.index');

// 404
Route::fallback(function () {
    abort(404);
});
