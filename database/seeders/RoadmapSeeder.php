<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Roadmap;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoadmapSeeder extends Seeder
{

    /**
     * @param  Faker  $faker
     */
    public function run(Faker $faker)
    {
        $events = Event::where('active', true)->get();

        foreach ($events as $event) {

            $countOfRoadmapSection = rand(3, 10);

            while ($countOfRoadmapSection) {

                $description = array();

                for ($i = 1; $i <= 5; $i++) {
                    $description[] = $faker->realText(mt_rand(100, 300));
                }
                $description = implode('<br><br>', $description);

                $coordinates = array(
                    'latitude' => $faker->latitude($min = 40, $max = 60),
                    'longitude' => $faker->longitude($min = 40, $max = 138)
                );

                //
                $inst = new Roadmap();

                $inst->event_id = $event->id;
                $inst->section = $countOfRoadmapSection;
                $inst->title = $faker->realText(100);
                $inst->description = $description;
                $inst->coordinates = json_encode($coordinates);

                $inst->save();
                //
                $countOfRoadmapSection--;
            }
        }
    }
}
