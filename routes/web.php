<?php

use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\YandexController;
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
Route::post('/events/map_all', [YandexController::class, 'getAll'])->name('yandex_map.all');
Route::post('/events/map_city', [YandexController::class, 'getCity'])->name('yandex_map.city');

Route::get('/events/default', [EventController::class, 'defaultSettings'])->name('events.events_default');
Route::get('/events/seen/clean', [EventController::class, 'eventsSeenClean'])->name('events.events_seen_clean');
Route::get('/events/compare/clean', [EventController::class, 'eventsCompareClean'])->name('events.events_compare_clean');
Route::get('/events/view/{view}', [EventController::class, 'viewMode'])->name('events.view_mode');
Route::get('/events/sort/{sort}', [EventController::class, 'sortMode'])->name('events.sort_mode');
Route::get('/events/category/{id}', [EventController::class, 'showEventsByCategory'])->name('events.events_categories');
Route::get('/events/country/{id}', [EventController::class, 'showEventsByCountry'])->name('events.events_countries');
Route::get('/events/city/{id}', [EventController::class, 'showEventsByCity'])->name('events.events_cities');

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
