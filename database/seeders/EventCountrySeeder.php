<?php

namespace Database\Seeders;

use App\Models\EventCountry;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class EventCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $countries = array();

        while (count($countries) < config('site.count_of_countries')) {
            $country = $faker->unique()->country;
            array_push($countries, $country);
        }

        foreach ($countries as $country) {
            $inst = new EventCountry();

            $inst->name = $country;
            $inst->slug = Str::slug($country);

            $inst->save();
        }
    }
}
