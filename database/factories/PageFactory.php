<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(100);

        //
        $text = array();
        for ($i = 1; $i <= 10; $i++) {
            $text[] = $this->faker->realText(mt_rand(100, 300));
        }
        $text = implode('<br><br>', $text);

        return [
            'page_category_id' => rand(1, 3),
            'title' => $title,
            'slug' => Str::slug(Str::limit($title, 20)),
            'text' => $text,
            'active' => $this->faker->boolean(90),
            'show' => $this->faker->boolean(90)
        ];
    }
}
