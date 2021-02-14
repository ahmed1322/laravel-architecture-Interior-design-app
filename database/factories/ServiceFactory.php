<?php

namespace Database\Factories;
use App\Traits\Icons;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    use Icons;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $services_title = [
            'Design & Planning',
            'Author Control',
            'Creating Concept',
            'Exterior Design',
            // 'Custom Solutions',
            'Furniture & Decor'
        ];
        $service_images = [
            'site/service/cCJZ7E2cmPfTnAjBxHq6gBcQntdHlCrMzxDJnfS9.jpg',
            'site/service/cdQy6KNuLGZGtQvjaPfFtD3KAnqpOO5ZBVpZDtnM.jpg',
            'site/service/m2ghsvXONrWeSKoS70SMXshmAmgyMjb80lHfRiHA.jpg',
            'site/service/q3hhp84sVc2ExIPoURWDIW4xr2T2DUP4ESuftZOB.jpg',
            'site/service/S3Mi5NWmrgpBEWTLXpRUlUkltm64sKDT3aAi10BB.jpg',
        ];
        return [
            'title' => $title = $this->faker->unique()->randomElement($services_title),
            'slug' => str_slug($title),
            'description' => $this->faker->sentence($nbWords = 200, $variableNbWords = false),
            'excerpt' => $this->faker->sentence($nbWords = 35, $variableNbWords = false),
            'icon' => $this->faker->unique()->randomElement($this->FlatIconClassName()),
            'image' => $title = $this->faker->unique()->randomElement($service_images ),
            // 'image' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
