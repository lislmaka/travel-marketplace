<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Support\ServiceProvider;

class FooterPagesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('*', function ($view) {

            $footerPageCategories = PageCategory::all();
            $footerPages = Page::where('active', true)->where('show', true)->get();

            /*
             * Подсчет кол-ва страниц в каждой категории
             */
            $footerPagesInCategories = array();
            foreach ($footerPageCategories as $pageCategory) {
                foreach ($footerPages as $page) {
                    if (array_key_exists($pageCategory->id, $footerPagesInCategories)) {
                        $footerPagesInCategories[$pageCategory->id]++;
                    } else {
                        $footerPagesInCategories[$pageCategory->id] = 1;
                    }
                }
            }

            $view->with('footerPageCategories', $footerPageCategories);
            $view->with('footerPages', $footerPages);
            $view->with('footerPagesInCategories', $footerPagesInCategories);
        });
    }
}
