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
            // Рандомное значение колва опций для каждого event
            $count_of_options = rand(5, 10);
            // Кол-во доступных опций
            $array_of_options = range(1,config('site.count_of_options'));

            while($count_of_options--)
            {
                shuffle($array_of_options);

                $price  =  rand(1000, 10000);
                $free = $price > 5000 ? false : true;

                $inst = new PivotEventOption();

                $inst->option_id = array_pop($array_of_options);
                $inst->event_id = $count_of_events;
                $inst->price = $price > 5000 ? $price : null;
                $inst->free = $free;

                $inst->save();
            }
        }
    }
}
