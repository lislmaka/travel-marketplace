<?php

namespace Database\Seeders;

use App\Models\EventResidence;
use Illuminate\Database\Seeder;

class EventResidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residences = array(
            array(
                'name' => 'Базовый',
                'description' => 'Палатки / Кемпинги / Хижины'
            ),
            array(
                'name' => 'Простой',
                'description' => 'Гостевые дома / Гостиницы 1* / Дома на колесах'
            ),
            array(
                'name' => 'Средний',
                'description' => 'Гостиницы 2* / Апартаменты / Коттеджи'
            ),
            array(
                'name' => 'Выше среднего',
                'description' => 'Гостиницы 3* / Виллы/ Лоджи'
            ),
            array(
                'name' => 'Высокий',
                'description' => 'Гостиницы 4-5*, Глэмпинги, Бутик-отели'
            )
        );
        foreach ($residences as $residence) {
            $inst = new EventResidence();

            $inst->name = $residence['name'];
            $inst->description = $residence['description'];

            $inst->save();
        }
    }
}
