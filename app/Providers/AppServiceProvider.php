<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Traits\DemoData;

class AppServiceProvider extends ServiceProvider
{
    use DemoData;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->isLocal()) {
            // IDE Helper
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);

            // Localizator
            $this->app->register(\Amirami\Localizator\ServiceProvider::class);

            // Telescope
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        /*
         *
         */
        view()->composer('*', function ($view)
        {
            $events = array();
            if (session('events.events_seen')) {
                $events = Event::where('active', true)->whereIn('id', session('events.events_seen'))->get();
            }
            $view->with('events_seen', $events );
            $view->with('demo_faces', DemoData::DemoFaces() );
            $view->with('demo_images2', DemoData::DemoImages2() );
        });
    }
}
