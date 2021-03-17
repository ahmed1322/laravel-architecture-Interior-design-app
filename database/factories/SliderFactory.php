<?php

namespace Database\Factories;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $slider_images = [
            'site/slider/7SNfskCrBuaszYrRaAKlxbt8GWfZif86q9eAw70U.jpg',
            'site/slider/GqzseTdXiLyDLOUf0d8y2jJO4DAtitEHxGXQxMI8.jpg',
            'site/slider/lOUxMs0zfBlGzStzkXGnbqWLRt0tH50KYdbwxOUu.jpg',
        ];
        return [
            'title' => $this->faker->unique()->randomElement(['New Level of Interior', 'Best Furniture and Decor ', 'High-end Interior Design']),
            'description' => $this->faker->sentence($nbWords = 20, $variableNbWords = false),
            'image' => $this->faker->unique()->randomElement($slider_images),
            // 'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'category_id' => $this->faker->numberBetween(1,7),
            'visible' => 1,
            'portfolio_id' => $this->faker->numberBetween(1,9),
        ];
    }
}
