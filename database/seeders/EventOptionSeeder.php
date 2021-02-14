<?php

namespace Database\Seeders;

use App\Models\EventOption;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class EventOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $options = array();

        while (count($options) < config('site.count_of_options')) {
            $option = $faker->unique()->catchPhrase;
            array_push($options, $option);
        }

        foreach ($options as $option) {
            $inst = new EventOption();

            $inst->name = $option;
            $inst->description = $faker->realText(300);
            $inst->slug = Str::slug($option);

            $inst->save();
        }
    }
}
