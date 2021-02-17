<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class EventCategorySeeder extends Seeder
{

    /**
     * @param  Faker  $faker
     */
    public function run(Faker $faker)
    {
        $categories = array();

        while (count($categories) < config('site.count_of_categories')) {
            $category = $faker->unique()->jobTitle;
            array_push($categories, $category);
        }

        foreach ($categories as $category) {
            $inst = new EventCategory();

            $inst->name = $category;
            $inst->slug = Str::slug($category);

            $inst->save();
        }
    }
}
