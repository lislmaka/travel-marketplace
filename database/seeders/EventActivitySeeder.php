<?php

namespace Database\Seeders;

use App\Models\EventActivity;
use Illuminate\Database\Seeder;

class EventActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = array(
            array(
                'name' => 'Расслабляющая',
                'description' => 'Минимальная интенсивность, расслабление'
            ),
            array(
                'name' => 'Спокойная',
                'description' => 'Низкая интенсивность, активности в рамках 1-2 локаций'
            ),
            array(
                'name' => 'Умеренная',
                'description' => 'Полу-энергичная деятельность на протяжении длительного периода времени'
            ),
            array(
                'name' => 'Интенсивная',
                'description' => 'Высокая интенсивность активности, дополнительная подготовка не нужна'
            ),
            array(
                'name' => 'Экстрим',
                'description' => 'Физически сложные виды деятельности, которые могут потребовать опыта или соответствующей подготовки'
            )
        );
        foreach ($activities as $activity) {
            $inst = new EventActivity();

            $inst->name = $activity['name'];
            $inst->description = $activity['description'];

            $inst->save();
        }
    }
}
