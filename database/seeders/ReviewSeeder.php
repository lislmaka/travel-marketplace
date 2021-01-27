<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $countOfEvents = config('site.count_of_events') + 1;

        while(--$countOfEvents)
        {
            // Рандомное значение колва отзывов для каждого event
            $countOfReviews = rand(5, 10);

            while($countOfReviews--)
            {
                $inst = new Review();

                $inst->user_id = rand(1, 10);
                $inst->event_id = $countOfEvents;
                $inst->description = $faker->realText(mt_rand(100, 300));
                $inst->rating = rand(1, 5);

                $inst->save();
            }
        }
    }
}
