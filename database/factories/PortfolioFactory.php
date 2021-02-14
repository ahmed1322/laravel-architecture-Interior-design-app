<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $portfolios_title = [
            'Stylish Family Appartment',
            'Minimal Guests House',
            'Art Family Residence',
            'Private House in Spain',
            'Modern Villa in Belgium',
            'Minimalistic Style Appartment',
            'Luxury Bathroom Interior',
            'White Italian Villa',
            'Loft Kitchen Interior'
        ];
        $portfolio_images = [
            'site/portfolio/07tsGIZSMZDee5qss8kgu2WHkAlRENaFjjwODnA7.jpg',
            'site/portfolio/50f9IRI3StnfpJzECIziSOKMYgFsO1cFiWbfK2vM.jpg',
            'site/portfolio/DtqfXWbUJLDAepVGzxqKF3qzR3QTODhyAJ0OAoT5.jpg',
            'site/portfolio/GQFv35y3DYomANlFxS6elcSNSG0lyR3xnrVWtGgr.jpg',
            'site/portfolio/HjK7bgNMw4z2LIIdkdEbEvnZ2LcYd5wHhojlyquK.jpg',
            'site/portfolio/KAOmT0HjHqB153ZnZGwmGGNLsV7I6NuWptXWvgCE.jpg',
            'site/portfolio/lCXv4HBct4UXKlDMJQJ8svrHvNMIYOSmihSzl2J7.jpg',
            'site/portfolio/OhbDfJ8cwfS2ASACG1du6sMrZx52mf9LQJ5VkLSQ.jpg',
            'site/portfolio/sMK2emGoIFbPXHwSuntlUR3DH4J1r9Ie8tSrW1Yr.jpg',
            // 'portfolio/SrTFApDgJiwqoW6jiZ7JQTA3cEscfPqlRjCaO6D3.jpg',
            // 'portfolio/xM9Vj3GQCHjr7nDaHcz96dH2llYZcqUMtS2cv6fM.jpg',
            // 'portfolio/YKfC99xgI0KnP83n908nu0CoIFhVTagz4IKUntXd.jpg',
        ];
        return [
            'title' => $title = $this->faker->unique()->randomElement($portfolios_title),
            'slug' => str_slug($title),
            'description' => $this->faker->sentence($nbWords = 20, $variableNbWords = false),
            'link' =>  $this->faker->unique()->url,
            'image' => $this->faker->unique()->randomElement($portfolio_images),
            'category_id' => $this->faker->numberBetween(1,7),
            'created_at' => now(),
        ];
    }
}
