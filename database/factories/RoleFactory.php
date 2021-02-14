<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['admin', 'sub_admin', 'reguler_user']),
            'post_roles' => serialize([ 'c' => 1,'r' => 1,'u' => 1,'d' => 1 ]),
            'category_roles' => serialize([ 'c' => 1,'r' => 1,'u' => 1,'d' => 1 ]),
            'tag_roles' => serialize([ 'c' => 1,'r' => 1,'u' => 1,'d' => 1 ])
        ];
    }
}
