<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (!app()->runningInConsole()) {
            view()->share('footerPageCategories', PageCategory::all());
            view()->share('footerPages', Page::where('active', true)->where('show', true)->get());
        }
    }
}
