<?php

namespace Database\Seeders;

use App\Models\PivotEventOption;
use Illuminate\Database\Seeder;

class PivotEventOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count_of_events = config('site.count_of_events') + 1;

        while(--$count_of_events)
        {
            // Рандомное значение колва категорий для каждого event
            $count_of_options = rand(1, 5);
            // Кол-во доступных категорий
            $array_of_options = range(1,config('site.count_of_options'));

            while($count_of_options--)
            {
                shuffle($array_of_options);

                $inst = new PivotEventOption();

                $inst->option_id = array_pop($array_of_options);
                $inst->event_id = $count_of_events;
                $inst->price = rand(1000, 10000);

                $inst->save();
            }
        }
    }
}