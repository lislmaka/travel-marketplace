<?php

namespace Database\Factories;

use App\Models\ServiceHelp;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceHelpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceHelp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $help = array();
        $countOfParagraph = rand(2, 10);
        for ($i = 1; $i <= $countOfParagraph; $i++) {
            $help[] = $this->faker->realText(mt_rand(100, 300));
        }
        $help = implode('<br><br>', $help);

        return [
            'key' => $this->faker->unique()->randomNumber($nbDigits = 4),
            'title' => $this->faker->unique()->realText(50),
            'help_ru' => $help,
            'help_en' => $help,
        ];
    }
}
