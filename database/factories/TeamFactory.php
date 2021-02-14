<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $team_roles = [
            'Marketing Consulting',
            'Developement Consulting',
            'Marketing Manager',
            'Finance Manager' ,'Company Founder',
            'Interior Designer',
            'CEO of Company'
        ];
        $team_images = [
            'site/team/0KeGUuAo0pEiB3QspcihkNtrVNeWXnRFAqjBpDLP.jpg',
            'site/team/3gEuvHkVMhI6gLnwUu3VIDFY0IqqD0lYgjHDEnFT.jpg',
            'site/team/7s5rRfaUavlKvzqg9zEQpszkc4cM9AIiY3iUZO3d.jpg',
            'site/team/BqFB5YsBqQe8U9fqcml6aSubTpjs0aqzO4Z4tIgH.jpg',
            'site/team/3gEuvHkVMhI6gLnwUu3VIDFY0IqqD0lYgjHDEnFT.jpg',
            'site/team/nWEGyfCbasqYSDgzWCwmb5FrBxIB8tiWDhRi7tPY.jpg',
            'site/team/XpjWWyonT1McTR1eyR1I7AJKtWlZ75Oca1Klmcs6.jpg',
        ];

        return [
            'name' => $name = $this->faker->unique()->name,
            'slug' => str_slug($name),
            // 'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'image' => $this->faker->unique()->randomElement($team_images),
            'role' => $this->faker->unique()->randomElement($team_roles)
        ];
    }
}
