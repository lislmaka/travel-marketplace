<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Http\Request;

/**
 * Class PageController
 * @package App\Http\Controllers\Frontend
 */
class PageController extends Controller
{
    /**
     * @param $page_info
     * @return array[]
     */
    private function breadcrumbs($page_info)
    {
        $breadcrumbs = array(
            array(
                'url' => $page_info->pageCategory->slug,
                'title' => $page_info->pageCategory->name
            ),
            array(
                'url' => $page_info->slug,
                'title' => $page_info->title
            )
        );

        return $breadcrumbs;
    }
    //

    /**
     * @param $categoryUrl
     * @param  null  $pageSlug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index($categoryUrl, $pageSlug = null)
    {
        // Проверяем существование категории
        if (PageCategory::where('url', $categoryUrl)->where('active', true)->doesntExist()) {
            // user found
            return abort(404);
        }

        // Проверяем существование страницы
        if ($pageSlug && Page::where('slug', $pageSlug)->where('active', true)->doesntExist()) {
            // user found
            return abort(404);
        }

        // Информация по выбранной категории
        $categoryInfo = PageCategory::where('url', $categoryUrl)->first();

        // Если указана конкретная страница то получаем информацию по ней
        // Если нет то берем первую страницу из указанной категории
        // TODO Может быть проблема если вообще нет страниц
        if ($pageSlug) {
            $pageInfo = Page::where('slug', $pageSlug)->first();
        } else {
            $pageInfo = Page::where('page_category_id', $categoryInfo->id)->where('active', true)->first();
        }

        // Получаем список категорий и список страниц в этой категории
        $categories = PageCategory::all();

        // Список страниц по категории можно также получить через отношение hasMany модели PageCategory
        // $pages = Page::where('page_category_id', $category_info->id)->where('active', true)->get();

        //

        $view_data = array(
            'title' => $categoryInfo->name.' - '.$pageInfo->title,
            'description' => 'Описание для каталога проектов',
            'breadcrumbs' => $this->breadcrumbs($pageInfo),
            'pageInfo' => $pageInfo,
            'categoryInfo' => $categoryInfo,
            'categories' => $categories
        );
        return view('site.frontend.pages.layout', $view_data);
    }
}
