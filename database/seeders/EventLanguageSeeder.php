<?php

namespace Database\Seeders;

use App\Models\EventLanguage;
use Illuminate\Database\Seeder;

class EventLanguageSeeder extends Seeder
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
                'name' => 'Английский',
                'description' => ''
            ),
            array(
                'name' => 'Русский',
                'description' => ''
            ),
            array(
                'name' => 'Французский',
                'description' => ''
            ),
        );
        foreach ($ages as $age) {
            $inst = new EventLanguage();

            $inst->name = $age['name'];
            $inst->description = $age['description'];

            $inst->save();
        }
    }
}
