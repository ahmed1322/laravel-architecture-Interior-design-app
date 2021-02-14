<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence($nbWords = 12, $variableNbWords = false),
            'post_id' => $this->faker->numberBetween(1,90),
            'user_id' => $this->faker->unique()->numberBetween(7,1006),
        ];
    }
}
