<?php

namespace Database\Seeders;

use App\Models\EventCity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class EventCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $cities = array();

        while (count($cities) < config('site.count_of_cities')) {
            $city = $faker->unique()->city;
            array_push($cities, $city);
        }

        //


        foreach ($cities as $city) {

            //
            $description = array();
            for ($i = 1; $i <= 5; $i++) {
                $description[] = $faker->realText(mt_rand(100, 300));
            }
            $description = implode('<br><br>', $description);

            $inst = new EventCity();

            $inst->country_id = rand(1, config('site.count_of_countries'));
            $inst->name = $city;
            $inst->slug = Str::slug($city);
            $inst->description = $description;

            $inst->save();
        }
    }
}
