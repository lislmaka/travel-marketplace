<?php

namespace Database\Seeders;

use App\Models\EventAge;
use Illuminate\Database\Seeder;

class EventAgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ages = array(
            array(
                'name' => '18-39',
                'description' => ''
            ),
            array(
                'name' => '30+',
                'description' => ''
            ),
            array(
                'name' => '40+',
                'description' => ''
            ),
            array(
                'name' => '50+',
                'description' => ''
            ),
            array(
                'name' => '60+',
                'description' => ''
            ),
            array(
                'name' => '70+',
                'description' => ''
            )
        );
        foreach ($ages as $age) {
            $inst = new EventAge();

            $inst->name = $age['name'];
            $inst->description = $age['description'];

            $inst->save();
        }
    }
}
