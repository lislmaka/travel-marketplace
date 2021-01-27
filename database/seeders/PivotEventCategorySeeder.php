<?php

namespace Database\Seeders;

use App\Models\PivotEventCategory;
use Illuminate\Database\Seeder;

class PivotEventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countOfEvents = config('site.count_of_events') + 1;

        while(--$countOfEvents)
        {
            // Рандомное значение колва категорий для каждого event
            $countOfCategories = rand(1, 5);
            // Кол-во доступных категорий
            $arrayOfCategories = range(1,config('site.count_of_categories'));

            while($countOfCategories--)
            {
                shuffle($arrayOfCategories);

                $inst = new PivotEventCategory();

                $inst->category_id = array_pop($arrayOfCategories);
                $inst->event_id = $countOfEvents;

                $inst->save();
            }
        }
    }
}
