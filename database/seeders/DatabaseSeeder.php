<?php

namespace Database\Seeders;

use App\Models\EventOption;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ServiceHelpSeeder::class);
        $this->call(PageCategorySeeder::class);
        $this->call(PageSeeder::class);
        $this->call(EventCountrySeeder::class);
        $this->call(EventCitySeeder::class);
        $this->call(EventActivitySeeder::class);
        $this->call(EventResidenceSeeder::class);
        $this->call(EventAgeSeeder::class);
        $this->call(EventLanguageSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EventCategorySeeder::class);
        $this->call(PivotEventCategorySeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(EventOptionSeeder::class);
        $this->call(PivotEventOptionSeeder::class);
        $this->call(RoadmapSeeder::class);
    }
}
