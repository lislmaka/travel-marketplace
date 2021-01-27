<?php

namespace Database\Seeders;

use App\Models\PageCategory;
use Illuminate\Database\Seeder;

class PageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageCategories = array(
            array(
                'url' => 'site-info',
                'name' => 'О сайте',
                'column' => 2
            ),
            array(
                'url' => 'company-info',
                'name' => 'О компании',
                'column' => 3
            ),
            array(
                'url' => 'partnership',
                'name' => 'Партнерство',
                'column' => 1
            )
        );
        foreach ($pageCategories as $pageCategory) {
            $inst = new PageCategory;

            $inst->name = $pageCategory['name'];
            $inst->url = $pageCategory['url'];
            $inst->column = $pageCategory['column'];

            $inst->save();
        }
    }
}
