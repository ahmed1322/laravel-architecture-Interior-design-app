<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\UnsplashRandomPhotos;

class PostFactory extends Factory
{
    use UnsplashRandomPhotos;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->sentence($nbWords = 5, $variableNbWords = false),
            'slug' => str_slug($title),
            'content' => $this->faker->sentence($nbWords = 20, $variableNbWords = false),
            'category_id' => $this->faker->numberBetween(1,7),
            'author_id' => $this->faker->numberBetween(2,6),
            'image' => $this->faker->unique()->randomElement($this->randomPhotos())
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Post $post) {
            //
        })->afterCreating(function (Post $post) {
            $tag = Tag::all()->random(mt_rand(1, 8))->pluck('id');

            $post->tags()->attach($tag);
        });
    }
}
