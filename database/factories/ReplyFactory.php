<?php

namespace Database\Factories;

use App\Models\Reply;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $post_id = $this->faker->numberBetween(1,90),
            'comment_id' => $this->faker->unique()->randomElement(Post::find($post_id)->comments->pluck('id')->toArray()),
            'user_id' => $this->faker->unique()->numberBetween(7,1006),
            'reply' => $this->faker->sentence($nbWords = 20, $variableNbWords = false),
        ];
    }
}
