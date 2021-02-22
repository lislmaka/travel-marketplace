<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->realText(100);

        $description = array();
        for ($i = 1; $i <= 5; $i++) {
            $description[] = $this->faker->realText(mt_rand(100, 300));
        }
        $description = implode('<br><br>', $description);

        $coordinates = array(
            'latitude' => $this->faker->latitude($min = 40, $max = 60),
            'longitude' => $this->faker->longitude($min = 40, $max = 138)
        );

        $price = rand(1000, 100000);
        $discount = rand(5, 50);
        $old_price = rand(1, 100) >= 50 ? $price +  ($discount * $price) / 100 : NULL;

        $city_id = rand(1, config('site.count_of_cities'));
        $country_query = \App\Models\EventCity::find($city_id);
        $country_id = $country_query->country_id;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'short_description' => $this->faker->realText(300),
            'description' => $description,
            'price' => $price,
            'old_price' => $old_price,
            'city_id' => $city_id,
            'country_id' => $country_id,
            'user_id' => rand(1, 10),
            'duration' => rand(1, 100),
            'address' => $this->faker->address,
            'coordinates' => json_encode($coordinates),
            'active' => $this->faker->boolean(50),
            'rating' => rand(1, 5),
            'img' => rand(1, 20).'.jpg'
        ];
    }
}
